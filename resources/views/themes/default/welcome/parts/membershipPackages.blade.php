@if(Agent::isMobile())

<style type="text/css">
    .pricelist_style {
        background-color: #fff !important;
        padding-top: 20px !important;
        /*border: none !important;*/
    }



    .w3-padding-large {
        padding: 12px 10px !important;
    }

    .w3-xxlarge {
        font-size: 30px !important;
    }

    .w3-xlarge {
        font-size: 19px !important;
    }

    .contact_button {
        background-color: #d52379 !important;
        border: 1px solid #d52379 !important;
        border-radius: 5px !important;
        width: 36% !important;
        padding-left: 11px !important;
        padding: 8px !important;
    }

    .price_package_border {
        border-radius: 10px !important;
        border: 0px !important;

        transition: box-shadow .3s !important;
        box-shadow: 0 0 16px rgb(200, 200, 200) !important;
    }

    .recommended_button {
        margin-top: -11px !important;
        border: 1px solid #d52379;
        background-color: #d52379 !important;
        color: #fff !important;
        border-radius: 5px;
        font-size: 9px !important;
        width: 30% !important;
        padding: 0px !important;
        font-weight: bold !important;
        margin-right: 35% !important;



    }

    .navbar-toggler:not(:disabled):not(.disabled) {
        cursor: pointer;
        border: 1px solid #D52379 !important;
        padding: 9px;

    }

    .navbar-toggler-icon {
        background-color: #D52379 !important;
    }

    .w3-border {
        border: 1px solid #D52379 !important;
        border-top-color: rgb(204, 204, 204);
        border-right-color: rgb(204, 204, 204);
        border-bottom-color: rgb(204, 204, 204);
        border-left-color: rgb(204, 204, 204);
    }

    .w3-text-white,
    .w3-hover-text-white:hover {
        color: #D52379 !important;
    }

    .navbar.bg-danger {
        background-color: #fff !important;
        /*background-color: #2E2F96 !important;*/
        box-shadow: 0 4px 18px 0px rgba(0, 0, 0, 0.12), 0 7px 10px -5px rgba(0, 0, 0, 0.15) !important;
    }

    .w3-purple,
    .w3-hover-purple:hover {
        color: #fff !important;
        background-color: #990000 !important;
    }

    .w3-text-purple,
    .w3-hover-text-purple:hover {
        color: #990000 !important;
    }
</style>







<div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">
        <div class="container">

            @include('welcome.includes.others.pricelist')
        </div>
    </div>
</div>

@else



<div class="main main-raiseds " style="z-index: 400;margin-top: -20px;">
    <div class="section section-basic" style="min-height: 900px;">
        <div class="container">

            @include('welcome.includes.others.pricelist')
        </div>
    </div>
</div>


@endif