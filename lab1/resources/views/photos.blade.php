@extends('layout')
@section('title','Photos')
@section('photos_class','active')
@section('content')
<h2>Student photos</h2>
<div class="image-container">
    <div>
        <img src="/images/boy1.png" alt="Boy1" width="116" height="188" />
        <h5>Boy1</h5>
    </div>
    <div>
        <img src="/images/boy2.png" alt="Boy2" width="116" height="188" />
        <h5>Boy2</h5>
    </div>
    <div>
        <img src="/images/boy3.png" alt="Boy3" width="116" height="188" />
        <h5>Boy3</h5>
    </div>
    <div>
        <img src="/images/boy4.png" alt="Boy4" width="116" height="188" />
        <h5>Boy4</h5>
    </div>
    <div>
        <img src="/images/boy5.png" alt="Boy5" width="116" height="188" />
        <h5>Boy5</h5>
    </div>
    <div>
        <img src="/images/boy6.png" alt="Boy6" width="116" height="188" />
        <h5>Boy6</h5>
    </div>

</div>
@endsection