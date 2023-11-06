<section class="card card--sticky">
    <div class="card__section">
        <div class="subscription">
            <div class="subscription__img">
                <img src="/static/img/general/bonus-teaser.webp?ver=23" width="275" height="133" alt="{{ __('messages.Альтернативный текст изображения подписаться') }}">
            </div>
            <div class="subscription__content">
                <h3 class="subscription__title">{{ __('messages.Подпишитесь')}}</h3>
                <p class="subscription__text">{{ __('messages.Будьте в курсе новых событий и новостей')}}</p>
                <div class="label label--hidden">
                    <label id="subscriptionLabel" for="subscription" class="label__text">{{ __('messages.Подписка на рассылку')}}</label>
                </div>
                <div class="textField">
                    <input id="subscription" class="textField__input" placeholder="{{ __('messages.Email')}}" type="text" autocomplete="off" aria-labelledby="subscriptionLabel" aria-invalid="false">
                    <div class="textField__suffix">
                        <button type="submit" class="button button--primary button--iconOnly subscription__button" aria-label="{{ __('messages.Подписаться на рассылку')}}">
                            <span class="button__icon">
                            <span class="icon icon--sizeSmall">
                                <svg class="icon__svg" aria-hidden="true">
                                    <use xlink:href="/static/img/general/sprites/sprite-arrows.svg#icon-arrow-right-bold"></use>
                                </svg>
                            </span>
                            </span>
                        </button>
                    </div>
                    <div class="textField__backdrop"></div>
                </div>
            </div>
        </div>
    </div>
</section>