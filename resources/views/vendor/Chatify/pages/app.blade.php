@extends('layouts.admin_layouts.base')
@section('custom_css_content')
    @include('Chatify::layouts.headLinks')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/src/assets/css/light/apps/chat.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/src/assets/css/dark/apps/chat.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <div class="chat-section layout-top-spacing">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="messenger">
                            {{-- ----------------------Users/Groups lists side---------------------- --}}
                            <div class="messenger-listView">
                                {{-- Header and search bar --}}
                                <div class="m-header">
                                    <nav>
                                        <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                                        {{-- header buttons --}}
                                        <nav class="m-header-right">
                                            <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                            <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                        </nav>
                                    </nav>
                                    {{-- Search input --}}
                                    <input type="text" class="messenger-search" placeholder="Search" />
                                    {{-- Tabs --}}
                                    <div class="messenger-listView-tabs">
                                        <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                                            <span class="far fa-user"></span> People</a>
                                        <a href="#" @if($type == 'group') class="active-tab" @endif data-view="groups">
                                            <span class="fas fa-users"></span> Groups</a>
                                    </div>
                                </div>
                                {{-- tabs and lists --}}
                                <div class="m-body contacts-container">
                                {{-- Lists [Users/Group] --}}
                                {{-- ---------------- [ User Tab ] ---------------- --}}
                                <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">
    
                                    {{-- Favorites --}}
                                    <div class="favorites-section">
                                        <p class="messenger-title">Favorites</p>
                                        <div class="messenger-favorites app-scroll-thin"></div>
                                    </div>
    
                                    {{-- Saved Messages --}}
                                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
    
                                    {{-- Contact --}}
                                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>
    
                                </div>
    
                                {{-- ---------------- [ Group Tab ] ---------------- --}}
                                <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
                                        {{-- items --}}
                                        <p style="text-align: center;color:grey;margin-top:30px">
                                            <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
                                        </p>
                                    </div>
    
                                    {{-- ---------------- [ Search Tab ] ---------------- --}}
                                <div class="messenger-tab search-tab app-scroll" data-view="search">
                                        {{-- items --}}
                                        <p class="messenger-title">Search</p>
                                        <div class="search-records">
                                            <p class="message-hint center-el"><span>Type to search..</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            {{-- ----------------------Messaging side---------------------- --}}
                            <div class="messenger-messagingView">
                                {{-- header title [conversation name] amd buttons --}}
                                <div class="m-header m-header-messaging">
                                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                        {{-- header back button, avatar and user name --}}
                                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                            <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                            <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                            </div>
                                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                        </div>
                                        {{-- header buttons --}}
                                        <nav class="m-header-right">
                                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                            <a href="/"><i class="fas fa-home"></i></a>
                                            <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                        </nav>
                                    </nav>
                                </div>
                                {{-- Internet connection --}}
                                <div class="internet-connection">
                                    <span class="ic-connected">Connected</span>
                                    <span class="ic-connecting">Connecting...</span>
                                    <span class="ic-noInternet">No internet access</span>
                                </div>
                                {{-- Messaging area --}}
                                <div class="m-body messages-container app-scroll">
                                    <div class="messages">
                                        <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                                    </div>
                                    {{-- Typing indicator --}}
                                    <div class="typing-indicator">
                                        <div class="message-card typing">
                                            <p>
                                                <span class="typing-dots">
                                                    <span class="dot dot-1"></span>
                                                    <span class="dot dot-2"></span>
                                                    <span class="dot dot-3"></span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- Send Message Form --}}
                                    @include('Chatify::layouts.sendForm')
                                </div>
                            </div>
                            {{-- ---------------------- Info side ---------------------- --}}
                            <div class="messenger-infoView app-scroll">
                                {{-- nav actions --}}
                                <nav>
                                    <a href="#"><i class="fas fa-times"></i></a>
                                </nav>
                                {!! view('Chatify::layouts.info')->render() !!}
                            </div>
                        </div>
    
                        @include('Chatify::layouts.modals')
                        @include('Chatify::layouts.footerLinks')

                    </div>
                </div>
            </div>

        </div>
        
    </div>

    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper mt-0">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
    <!--  END FOOTER  -->
</div>

<script>
    $(document).ready(function(){
        $('.show').css('display', 'block');
    });
</script>

@endsection
@section('custom_js_content')
<script src={{ asset('assets/src/assets/js/apps/chat.js') }}"></script>
@endsection


