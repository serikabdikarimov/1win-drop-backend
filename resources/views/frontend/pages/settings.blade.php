@extends('frontend.layout.app-without-seo')

@section('content')
    <!-- Profile Begin -->
    <section class="profile">
        <div class="profile__menu">
            <button type="button" class="profile__menuToggle" data-user-menu-toggle>
                <span class="icon icon--sizeMedium">
                <svg class="icon__svg" aria-hidden="true">
                    <use xlink:href="/static/img/general/sprite.svg#icon-angle-left"></use>
                </svg>
            </span>
            </button>
            <h2 class="profile__heading">{{ __('messages.Личный кабинет') }}</h2>
            <ul class="profile__menuList">
                <li class="profile__menuItem">
                    <a href="/profile" class="profile__menuLink {{ \Request::route()->getName() == 'profile' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-user-v2"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Профиль') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <a href="/profile/favorites" class="profile__menuLink {{ \Request::route()->getName() == 'profile.favorites' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-heart"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Избранное') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <a href="/profile/settings" class="profile__menuLink {{ \Request::route()->getName() == 'profile.settings' ? 'profile__menuLink--active' : '' }}">
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-lock"></use>
                            </svg>
                         </span>
                        </span>
                        <span class="profile__text">{{ __('messages.Пароль') }}</span>
                    </a>
                </li>
                <li class="profile__menuItem">
                    <form action="/logout" class="profile__menuLink" method="POST">
                        {{ csrf_field() }}
                        <span class="profile__menuIcon">
                         <span class="icon icon--colorSubdued icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-logout"></use>
                            </svg>
                         </span>
                        </span>
                        <button class="profile__text">{{ __('messages.Выйти') }}</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="profile__content">
            <h2 class="profile__heading">{{__('messages.Пароль')}}</h2>
            <form class="profile__formLayout" action="/profile/settings" method="post">
                {{ csrf_field() }}
                <div class="profile__formLayoutBody">
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userNameLabel" for="userName" class="label__text">{{__('messages.Старый пароль')}}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField {{ $errors->has('old_password') ? 'textField--error' : ''}}">
                                <input id="userName" name="old_password" class="textField__input" placeholder="" type="password" autocomplete="off" aria-labelledby="userNameLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userLastNameLabel" for="userLastName" class="label__text">{{__('messages.Новый пароль')}}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField {{ $errors->has('password') ? 'textField--error' : ''}}">
                                <input id="userLastName" name="password" class="textField__input" placeholder="" type="password" autocomplete="off" aria-labelledby="userLastNameLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userPhoneLabel" for="userPhone" class="label__text">{{__('messages.Повторите пароль')}}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField {{ $errors->has('password_confirmation') ? 'textField--error' : ''}}">
                                <input id="userPhone" name="password_confirmation" class="textField__input" placeholder="" type="password" autocomplete="off" aria-labelledby="userPhoneLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile__formLayoutFooter">
                    <div class="buttonGroup">
                        {{-- <div class="buttonGroup__item">
                            <button type="button" class="button button--plain" aria-label="{{__('messages.Отменить')}}">
                                <span class="button__text">{{__('messages.Отмена')}}</span>
                            </button>
                        </div> --}}
                        <div class="buttonGroup__item">
                            <button type="submit" class="button button--primary" aria-label="{{__('messages.Сохранить')}}">
                                <span class="button__text">{{__('messages.Сохранить')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/. Profile End -->
@stop