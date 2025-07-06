<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title')</title>
<!--=============== css  ===============-->
<link type="text/css" rel="stylesheet" href="/site/css/plugins.css">
<link type="text/css" rel="stylesheet" href="/site/css/style.css">
<!--=============== favicons ===============-->
<link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    rel="stylesheet"
/>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN' }, 'translate_select');
    }
</script>

<style>
    #goog-gt-tt {
        display: none !important;
    }
    .skiptranslate{
        display: none;
        top: 0;
    }
    .goog-te-banner-frame{display: none !important;}
    .goog-text-highlight { background: none !important; box-shadow: none !important;}
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body {
        position: revert!important;
        top: 0px !important;
    }
</style>


<style>
    /* ----- Common styles for all toasts ----- */
    .toast {
        border-radius: 0.5rem !important;
        padding: 1rem 1.5rem !important;
        font-family: 'Segoe UI', Roboto, sans-serif !important;
        font-size: 0.95rem !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08) !important;
        opacity: 0;
        transform: translateY(-20px);
        animation: toast-in 0.4s forwards, toast-out 0.4s 2.6s forwards;
    }

    /* Cho progress bar mảnh, hiện đại */
    .toast-progress {
        height: 4px !important;
        border-radius: 2px !important;
        opacity: 0.7 !important;
    }

    /* Animation vào/ra */
    @keyframes toast-in {
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes toast-out {
        to { opacity: 0; transform: translateY(-20px); }
    }

    /* ----- Success ----- */
    .toast-success {
        background: #e6f9f0 !important;
        border-left: 5px solid #28a745 !important;
        color: #155724 !important;
    }
    .toast-success .toast-message::before {
        content: "\f058";      /* FontAwesome check-circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-right: 0.5rem;
        color: #28a745;
    }

    /* ----- Error ----- */
    .toast-error {
        background: #fbeaea !important;
        border-left: 5px solid #dc3545 !important;
        color: #721c24 !important;
    }
    .toast-error .toast-message::before {
        content: "\f057";      /* FontAwesome times-circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-right: 0.5rem;
        color: #dc3545;
    }

    /* ----- Warning ----- */
    .toast-warning {
        background: #fff8e6 !important;
        border-left: 5px solid #ffc107 !important;
        color: #856404 !important;
    }
    .toast-warning .toast-message::before {
        content: "\f071";      /* FontAwesome exclamation-triangle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-right: 0.5rem;
        color: #ffc107;
    }

    /* ----- Info (nếu cần) ----- */
    .toast-info {
        background: #e7f1ff !important;
        border-left: 5px solid #007bff !important;
        color: #004085 !important;
    }
    .toast-info .toast-message::before {
        content: "\f05a";      /* FontAwesome info-circle */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        margin-right: 0.5rem;
        color: #007bff;
    }


</style>


