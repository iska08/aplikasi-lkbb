<link rel="stylesheet" href="{{ url('frontend/libraries/bootstrap-icons/bootstrap-icons.css') }}" />
{{-- cdn datatable css --}}
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
{{-- style css --}}
<link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" />
{{-- foontawesome js --}}
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="{{ url('backend/js/dselect.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    .slide-container {
        position: relative;
        overflow: hidden;
    }
    .slide-content {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }
    .slide-item {
        min-width: 100%;
        flex: 0 0 auto;
        margin-right: 15px;
    }
    .rata-atas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #f0f0f0;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }
    .service-item {
        transition: all ease-in-out 0.4s;
        background: white;
        height: 100%;
        border-radius: 15px;
    }

    .service-item .icon {
        margin-bottom: 10px;
    }

    .service-item .icon i {
        color: grey;
        font-size: 36px;
        transition: 0.3s;
    }

    .service-item h4 {
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 24px;
    }

    .service-item h4 a {
        color: grey;
        transition: ease-in-out 0.3s;
    }

    .service-item p {
        line-height: 24px;
        font-size: 14px;
        margin-bottom: 0;
    }

    .service-item:hover {
        transform: translateY(-10px);
        box-shadow: 0px 0 60px 0 gold;
    }

    .service-item:hover h4 a {
        color: gold;
    }
</style>