@extends('frontend.layouts.app')

@section('content')
    Front End Under Development
@endsection

@section('after-scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // To Use Select2
        Backend.Select2.init();

        if($.session.get("tab") == "edit")
        {
            $("#li-password").removeClass("active");
            $("#li-profile").removeClass("active");
            $("#li-edit").addClass("active");

            $("#profile").removeClass("active");
            $("#password").removeClass("active");
            $("#edit").addClass("active");
        }
        else if($.session.get("tab") == "password")
        {
            $("#li-password").addClass("active");
            $("#li-profile").removeClass("active");
            $("#li-edit").removeClass("active");

            $("#profile").removeClass("active");
            $("#password").addClass("active");
            $("#edit").removeClass("active");
        }

        $(".tabs").click(function() {
            var tab = $(this).attr("aria-controls");
            $.session.set("tab", tab);
        });
    });
</script>
@endsection
