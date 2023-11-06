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
            <h2 class="profile__heading">{{ __('messages.Профиль') }}</h2>
            <div class="profile__info">
                
                <div class="profile__avatar">
                    @if ($user->getAvatar != null)
                        <img src="/storage/uploads/{{ $user->getAvatar->url }}" class="profile__avatarPic" alt="">
                    @else
                        <svg class="icon__svg" aria-hidden="true"><use xlink:href="/static/img/general/icon-profile.svg#icon-user"></use></svg>
                    @endif
                </div>
                <div class="profile__name">{{ $user->name }} {{ $user->surname }}</div>
                <div class="profile__actions">
                    <button type="button" class="button button--plain" aria-label="{{ __('messages.Выбрать аватар') }}"  data-micromodal-trigger="modal-avatar-picker">
                        <span class="button__text">{{ __('messages.Выбрать аватар') }}</span>
                    </button>
                    <a href="/delete-avatar" class="button button--sizeLarge button--plain button--iconOnly" aria-label="{{ __('messages.Удалить') }}">
                        <span class="button__icon">
                        <span class="icon icon--sizeMedium">
                            <svg class="icon__svg" aria-hidden="true">
                                <use xlink:href="/static/img/general/sprite.svg#icon-trash"></use>
                            </svg>
                        </span>
                        </span>
                    </a>
                </div>
            </div>
            <form class="profile__formLayout" action="/update-profile" method="post">
                {{ csrf_field() }}
                <div class="profile__formLayoutBody">
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userNameLabel" for="userName" class="label__text">{{ __('messages.Имя') }}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField">
                                <input id="userName" name='name' class="textField__input" value="{{ isset($user->name) ? $user->name : ''}}" placeholder="{{ __('messages.Введите ваше имя') }}" type="text" autocomplete="off" aria-labelledby="userNameLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userLastNameLabel" for="userLastName" class="label__text">{{ __('messages.Фамилия') }}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField">
                                <input id="userLastName" name='surname' class="textField__input" value="{{ isset($user->surname) ? $user->surname : ''}}" placeholder="{{ __('messages.Введите вашу фамилию') }}" type="text" autocomplete="off" aria-labelledby="userLastNameLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userPhoneLabel" for="userPhone" class="label__text">{{ __('messages.Телефон') }}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField">
                                <input id="userPhone" name='phone' class="textField__input" value="{{ isset($user->phone) ? $user->phone : ''}}" placeholder="{{ __('messages.Введите ваш телефон') }}" type="text" autocomplete="off" aria-labelledby="userPhoneLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__formLayoutRow">
                        <div class="profile__formLayoutItem">
                            <div class="label">
                                <label id="userEmailLabel" for="userPhone" class="label__text">{{ __('messages.Почта') }}</label>
                            </div>
                        </div>
                        <div class="profile__formLayoutItem">
                            <div class="textField">
                                <input id="userEmail" name='email' class="textField__input" value="{{ isset($user->email) ? $user->email : ''}}" placeholder="{{ __('messages.Введите ваш электронный адрес') }}" type="text" autocomplete="off" aria-labelledby="userEmailLabel" aria-invalid="false">
                                <div class="textField__backdrop"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile__formLayoutFooter">
                    <div class="buttonGroup">
                        {{-- <div class="buttonGroup__item">
                            <button type="button" class="button button--plain" aria-label="Отменить">
                                <span class="button__text">{{ __('messages.Отмена') }}</span>
                            </button>
                        </div> --}}
                        <div class="buttonGroup__item">
                            <button type="submit" class="button button--primary" aria-label="Сохранить">
                                <span class="button__text">{{ __('messages.Сохранить') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/. Profile End -->
@stop