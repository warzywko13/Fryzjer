<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Reservation;

class ReservationsController extends Controller
{
    public function addOrUpdate(Request $request, $id = null){
        $user = Auth::user()->name;
        $visitDate = $request -> get('visitDate');
        $hourDate = $request -> get('hourDate');
        $procedure = $request -> get('procedure');

        $validator = \Validator::make($request->all(), [
            'visitDate' => 'required',
            'hourDate' => 'required',
            'procedure' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['msg' => 'Błąd. Proszę o uzupełnienie wszystkich kolumn oraz o długość zabiegu większą niż 5.']);
        }

        /* Add Or Update */
        if(!is_null($id)){
            $rowCollidate = DB::scalar('select count(*) as result from reservations where visitDate = :visitDate and :hourDate between ADDTIME(hourDate, "-0:59") and ADDTIME(hourDate, "0:59") and id <> :id', ['visitDate' => $visitDate, 'hourDate' => $hourDate, 'id' => $id]);

            if($rowCollidate > 0){
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['msg' => 'Błąd. Rezerwacja na wskazaną godzinę jest już zajęta. Jeden zabieg zajmuje godzinę!']);
            }

            $result = Reservation::findOrFail($id) -> where('user', $user) -> update([
                'user' => $user,
                'visitDate' => $visitDate,
                'hourDate' => $hourDate,
                'procedure' => $procedure
            ]);

            if($result == 0){
                return redirect('/reservation')
                -> withErrors(['error' => 'Nie posiadasz uprawnień do tego dokumentu lub id nie istnieje!']);
            }

            return redirect('/reservation')
                        -> with('success', 'Wizyta została zaktualizowana.');
        }else{
            $rowCollidate = DB::scalar('select count(*) as result from reservations where visitDate = :visitDate and :hourDate between ADDTIME(hourDate, "-0:59") and ADDTIME(hourDate, "0:59")', ['visitDate' => $visitDate, 'hourDate' => $hourDate]);

            if($rowCollidate > 0){
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['msg' => 'Błąd. Rezerwacja na wskazaną godzinę jest już zajęta. Jeden zabieg zajmuje godzinę!']);
            }

            Reservation::create([
                'user' => $user,
                'visitDate' => $visitDate,
                'hourDate' => $hourDate,
                'procedure' => $procedure
            ]);

            return redirect('/reservation')
                        -> with('success', 'Wizyta na dzień '.$visitDate.' '.$hourDate.' została poprawnie zarejestrowana.');
        }
    }

    public function create(){
        if(Auth::check()){
            return view('forms.add');
        }

        return redirect('/reservation') -> withErrors(['msg' => 'Aby zarejestrować wizytę należy być zalogowany.']);
    }

    public function edit($id){
        $reservation = Reservation::findOrFail($id);

        return view('forms.edit', ['reservation' => $reservation]);
    }

    public function delete($id){
        $result = Reservation::where([
            ['user', '=', Auth::user()->name],
            ['id', '=', $id]
        ]) -> delete();

        if($result === 0){
            return redirect('/reservation') -> withErrors(['msg' => 'Nie znaleziono id bądź nieautoryzowany użytkownik.']);
        }

        return redirect('/reservation') -> with('success', 'Wizyta została poprawnie usunięta.');
    }

    public function index(){
        $reservation = Reservation::orderBy('visitDate', 'ASC')
                        ->orderBy('hourDate', 'ASC')
                        ->paginate(3);

        return view('reservation', ['reservations' => $reservation, 'date' => '']);
    }
}
