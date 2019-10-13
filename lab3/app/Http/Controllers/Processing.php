public function process(){
$formData = request()->all();
return view('processing',compact('formData'));
}