@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="thumbnail center well well-small text-center">
                <h2>Front End Under Developement</h2>
                <hr>
                <h2>Terms Of Service</h2>
                <p>Please read and accept our terms to proceed.</p>

                <form action="accept-terms-of-service" method="post">
                    @csrf
                    <input type="hidden" id="acceptance" name="acceptance" value="true">
                    <br />
                    <button type="submit" class="btn btn-large"><b>ACCEPT & CONTINUE</b></button>
                </form>
                <br/>
                <a href="{{url('denied-terms-of-service')}}"><button value="Leave" class="btn btn-large btn-danger"><b>LEAVE</b></button></a>
            </div>
        </div>
    </div>
</div>
@endsection


