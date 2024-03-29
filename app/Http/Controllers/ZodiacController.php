<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zodiac;
class ZodiacController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	public function index() {
		$zodiacs = Zodiac::orderBy('id', 'desc')->paginate(20);
		
		return view('zodiac', compact('zodiacs'));
	}
	
	public function zodiacForm() {
		$zodiacVars = Zodiac::$zodiacVars;
		return view('zodiacNew', compact('zodiacVars'));
	}
	
	public function store(Request $request) {
		$this->validate($request, [
			'title' => 'required | min:70',
			'date'  => 'required',
		]);
		
		$timestamp = strtotime($request->date);
		$day = date("d", $timestamp);
		$month = date("m", $timestamp);
		
		$check = Zodiac::where([
			['day', '=', $day],
			['month', '=', $month],
			['numberborg', '=', $request->numberborg],
		])->get();
		if($check->count() > 0) {
			return redirect()->back()->withErrors('يوجد بالفعل حظك اليوم لهذا البرج');
		}
		$zodiac = new Zodiac;
		$zodiac->title = $request->title;
		$zodiac->day = $day;
		$zodiac->month = $month;
		$zodiac->numberborg = $request->numberborg;
		
		if($zodiac->save()){
			session()->flash('message', 'تم إضافة حظك اليوم لهذا البرج');
			return redirect()->back();
		} else {
			return redirect()->back()->withErrors('لم يتم إضافة حظك اليوم لوجود خطأ ما من فضلك تواصل مع المختص');
		}
	}
	
	public function zodiacEdit($id) {
		$zodiac = Zodiac::find($id);
		$zodiacVars = Zodiac::$zodiacVars;
		return view('zodiacEdit', compact(['zodiac', 'zodiacVars']));
	}
	
	public function update(Request $request){
		
		$zodiac = Zodiac::find($request->id);
		$zodiac->title = $request->title;
		$zodiac->numberborg = $request->numberborg;
		
		if($zodiac->save()){
			session()->flash('message', 'تم تحرير حظك اليوم بنجاح');
			return redirect()->back();
		} else {
			return redirect()->back()->withErrors('لم يتم إضافة حظك اليوم لوجود خطأ ما من فضلك تواصل مع المختص');
		}
		
	}
	
	public function delete($id) {
		$zodiac = Zodiac::find($id);
		
		$zodiac->delete();
		
		session()->flash('message', 'تم مسح حظك اليوم لهذا البرج بنجاح');
		return redirect()->back();
	}
	
	public function dateForm(Request $request) {
		$date = $request->date;
		session(['date' => $date]);
		return redirect('date');
	}
	
	public function date(){
		$date = session('date');
		$timestamp = strtotime($date);
		$day = date("d", $timestamp);
		$month = date("m", $timestamp);
		$zodiacVars = Zodiac::$zodiacVars;
		$date = date("M d, Y", $timestamp);
		$zodiacs = Zodiac::where([
			['day', '=', $day],
			['month', '=', $month],
		])->get();
		
		return view('date', compact(['zodiacs', 'zodiacVars', 'date']));
	}
	
}
