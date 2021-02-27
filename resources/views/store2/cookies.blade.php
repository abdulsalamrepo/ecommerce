@extends('store2.layout_master')
@section('content')
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{route('user.home')}}">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="javascript:;">About Cookies</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            A cookie is simply a technology for remembering something about you.
                            Without cookies, a website is like a goldfish who loses its memory every time you visit a new page. Once you visit a new page, it doesn’t remember who you are.

                            Now this can be a good and a bad thing. Without any memory, a website can’t do a lot of stuff. It can’t let you log in, because it forgets who you are. It can’t let you buy anything, because it forgets what you’re buying.

                            But it also means it can’t track you. Some websites use cookies to remember what you do on their website, and to target ads at you. And some of those websites share their cookies, so that ads on one website know what you liked on another. This has scared a lot of people.

                            Cookies aren’t automatically good or bad, but it’s worth understanding what you can do about them.

                            You can turn them off completely, which is a bit like banning all music to prevent another Justin Bieber album. Many websites simply won’t work.

                            A better option would be to turn off 3rd party cookies, which will stop most websites from sharing information about you. Some browsers – like Safari – do this automatically.

                            And finally, you can take a deeper look into any websites which concern you. Most websites have policies that explain what they do, if you care to look.

                            Well over 90% of websites use cookies. Cookies aren’t automatically good or bad, but it’s worth understanding what you can do about them. We recommend reading Osano’s explainer on how cookies work, if you’d like to learn more.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
@endsection
