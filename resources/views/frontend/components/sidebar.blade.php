<section class="card">
    <div class="card__section">
        <div class="card__body">
            <h4>Категории</h4>
        </div>
        <ul class="categories">
            <li class="categories__item">
                <a href="#" class="categories__link">
                    <svg aria-hidden="true" class="categories__icon">
                        <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-reviews"></use>
                    </svg>
                    <span class="categories__text">Отзывы</span>
                </a>
            </li>
            <li class="categories__item">
                <a href="#" class="categories__link">
                    <svg aria-hidden="true" class="categories__icon">
                        <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-heart"></use>
                    </svg>
                    <span class="categories__text">Популярные статьи</span>  <span class="categories__badge">Soon</span>
                </a>
            </li>
            <li class="categories__item">
                <a href="#" class="categories__link">
                    <svg aria-hidden="true" class="categories__icon">
                        <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-table"></use>
                    </svg>
                    <span class="categories__text">Турнирная таблица</span>
                </a>
            </li>
            <li class="categories__item">
                <a href="#" class="categories__link">
                    <svg aria-hidden="true" class="categories__icon">
                        <use xlink:href="/static/img/general/sprites/sprite-categories.svg#icon-new"></use>
                    </svg>
                    <span class="categories__text">Новые онлайн-казино</span>
                </a>
            </li>
        </ul>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <div class="card__body">
            <h4>Обсуждаемое</h4>
        </div>
        <ul class="featured-news">
            <li class="featured-news__item">
                <article>
                    <h3 class="featured-news__title">Логотип крупнейшей компании по производству мыльных </h3>
                    <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                    <a href="#" class="featured-news__link" aria-label="Логотип крупнейшей компании по производству мыльных - 12 июня"></a>
                </article>
            </li>
            <li class="featured-news__item">
                <article>
                    <h3 class="featured-news__title">Как начать и закончить большое дело</h3>
                    <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                    <a href="#" class="featured-news__link" aria-label="Как начать и закончить большое дело - 12 июня"></a>
                </article>
            </li>
            <li class="featured-news__item">
                <article>
                    <h3 class="featured-news__title">Политика не может не реагировать на полуночный пёсий вой</h3>
                    <time datetime="2023-06-12" class="featured-news__date">12 июня</time>
                    <a href="#" class="featured-news__link" aria-label="Политика не может не реагировать на полуночный пёсий вой - 12 июня"></a>
                </article>
            </li>
        </ul>
    </div>
</section>
<section class="card">
    <div class="card__section">
        <div class="subscription">
            <div class="subscription__img">
                <img src="/static/img/general/bonus-teaser.webp?ver=23" width="275" height="133" alt="Бонус 300% к депозиту">
            </div>
            <div class="subscription__content">
                <h3 class="subscription__title">Подпишитесь</h3>
                <p class="subscription__text">Будьте в курсе новых событий и новостей</p>
                <div class="label label--hidden">
                    <label id="subscriptionLabel" for="subscription" class="label__text">Подписка на рассылку</label>
                </div>
                <div class="textField">
                    <input id="subscription" class="textField__input" placeholder="Email" type="text" autocomplete="off" aria-labelledby="subscriptionLabel" aria-invalid="false">
                    <div class="textField__suffix">
                        <button type="submit" class="button button--primary button--iconOnly subscription__button" aria-label="Подписаться на рассылку">
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
@stop
