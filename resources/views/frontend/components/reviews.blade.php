<!-- Reviews Begin -->
<div class="card">
    @include('flash-message')
    <div class="card__header card__header--hasMetaData">
        <h2 class="card__headerTitle">{{ __('messages.Отзывы') }}</h2>
        <span class="card__headerMeta">{{ isset($reviews) ? $reviews->count() : '0'}}</span>
    </div>
    <div class="card__section">
        <div class="reviews">
            <ul class="reviews__list">
                @if (isset($reviews))
                @foreach($reviews as $item)
                <li class="reviews__listItem">
                    <div class="reviewsItem">
                        <div class="reviewsItem__avatar">
                            <picture>
                                <img src="/static/img/content/placeholder.svg" width="48" height="48" alt="Логотип Казино" loading="lazy">
                            </picture>
                        </div>
                        <div class="reviewsItem__content">
                            <div class="reviewsItem__name">{{ $item->name }}</div>
                            <span class="reviewsItem__date">{{ $item->created_at }}</span>
                            <div class="reviewsItem__rate">
                                <ul class="rate" aria-label="{{__('messages.Рейтинг 1win')}}">
                                    @for($i = 1; $i<=5; $i++)
                                    <li class="rate__item {{ $i <= $item->vote ? 'rate__item--active' : '' }}" role="presentation">
                                        <svg aria-hidden="true" class="rate__icon">
                                            <use xlink:href="/static/img/general/sprite.svg#icon-star"></use>
                                        </svg>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                        <div class="reviewsItem__desc">
                            <p>{{ $item->message }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
    {{--<div class="card__section">
        <div class="text--center">
            <button type="button" class="button button--primary" aria-label="Показать ещё">
                <span class="button__text">Показать ещё</span>
            </button>
        </div>
    </div>--}}
    <div class="card__section">
        {{ csrf_field() }}
        <div class="reviewsForm">
            <div class="reviewsForm__avatar">
                <picture>
                    <img src="/static/img/content/placeholder.svg" width="48" height="48" alt="Логотип Казино" loading="lazy">
                </picture>
            </div>
            <div class="reviewsForm__top">
                <fieldset class="reviewsForm__rate">
                    <legend>{{__('messages.Ваша оценка')}}:</legend>
                    <div class="reviewsForm__rateList">
                        <input class="reviewsForm__input" checked type="radio" name="vote" value="1" id="rating-1">
                        <label class="reviewsForm__label" for="rating-1" aria-label="One"></label>
                        <input class="reviewsForm__input" type="radio" name="vote" value="2" id="rating-2">
                        <label class="reviewsForm__label" for="rating-2" aria-label="Two"></label>
                        <input class="reviewsForm__input" type="radio" name="vote" value="3" id="rating-3">
                        <label class="reviewsForm__label" for="rating-3" aria-label="Three"></label>
                        <input class="reviewsForm__input" type="radio" name="vote" value="4" id="rating-4">
                        <label class="reviewsForm__label" for="rating-4" aria-label="Four"></label>
                        <input class="reviewsForm__input" type="radio" name="vote" value="5" id="rating-5">
                        <label class="reviewsForm__label" for="rating-5" aria-label="Five"></label>
                    </div>
                </fieldset>
                <span class="reviewsForm__rateTitle">{{__('messages.Ваша оценка')}}</span>
                {!! $errors->first('vote', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="reviewsForm__form">
                <div class="formLayout">
                    <div class="formLayout__row">
                        <div class="formLayout__item">
                            <div class="label">
                                <label id="clientNameLabel" for="clientName" class="label__text">{{ __('messages.Имя') }} *</label>
                            </div>
                            <div class="textField">
                                <input id="clientName" name="name" placeholder="{{ __('messages.Имя') }}" autocomplete="off" class="textField__input" type="text" aria-labelledby="clientNameLabel" aria-invalid="false" required>
                                <div class="textField__backdrop"></div>
                            </div>
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="formLayout__item">
                            <div class="label">
                                <label id="clientEmailLabel" for="clientEmail" class="label__text">{{__('messages.Email')}} *</label>
                            </div>
                            <div class="textField">
                                <input id="clientEmail" name="email" placeholder="name@example.com" autocomplete="off" class="textField__input" type="text" aria-labelledby="clientEmailLabel" aria-invalid="false" required>
                                <div class="textField__backdrop"></div>
                            </div>
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="formLayout__item">
                        <div class="label">
                            <label id="clientMessageLabel" for="clientMessage" class="label__text">{{__('messages.Ваше сообщение')}} *</label>
                        </div>
                        <div class="textField textField--multiline">
                            <textarea id="clientMessage" name="message" placeholder="{{__('messages.Ваше сообщение')}}..." autocomplete="off" class="textField__input" aria-labelledby="clientMessageLabel" aria-invalid="false"></textarea>
                            <div class="textField__backdrop"></div>
                        </div>
                        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="formLayout__item">
                        <div class="captcha">
                            <div class="label label--hidden">
                                <label id="captchaLabel" for="captcha" class="label__text">{{__('messages.Введите качпу')}} *</label>
                            </div>
                            <div class="captcha__input">
                                <div class="textField">
                                    <input id="captcha" autocomplete="off" class="textField__input" aria-labelledby="captchaLabel" aria-invalid="false" placeholder="{{ __('messages.ответ') }}">
                                    <div class="textField__backdrop"></div>
                                </div>
                                {!! $errors->first('captcha', '<p class="help-block">:message</p>') !!}
                            </div>
                            <img src="/captcha_image" class="captcha__img" title="" alt="" width="80" height="40">
                        </div>
                    </div>
                    <div class="formLayout__item">
                        <div class="text--end">
                            <button id="sendReview" type="submit" class="button button--primary send-review" aria-label="{{__('messages.Отправить')}}">
                                <span class="button__text">{{__('messages.Отправить')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/. Reviews End -->