<?php
$contents = $block->mappedByKey();
?>
<section class="offer">
    <div class="offer__container">
        <div class="offer__image">
            <img class="design-l" src="{{ url('/img/templates/offer/design-l.svg') }}" alt="decoration">
            <img class="offer__image-bg" src="{{ "/uploads/contents/" . $contents['image']['value'] ?? '' }}" alt="{{ $contents['title']['value'] ?? '' }}">
        </div>
        <div class="offer__form">
            <div class="offer__form-wrapper">
                <img class="design-r" src="{{ url('/img/templates/offer/design-r.svg') }}" alt="decoration">
                <h2 class="offer__title">
                    {{ $contents['title']['value'] ?? '' }}
                </h2>
                <p class="offer__subtitle">{{ $contents['subtitle']['value'] ?? '' }}</p>
                <form id="auto_order" action=""
                      onsubmit="call($(this).attr('id'))" method="post"
                      class="form_block form-template-send">
                    <input type="hidden" name="to_email" value="{{ $contents['email']['value'] ?? '' }}">
                    <input type="hidden" name="formid" value="{{ $contents['theme']['value'] ?? '' }}">
                    <input type="hidden" name="title" value="{{ $contents['mail-title']['value'] ?? '' }}">
                    <input type="hidden" name="ip"
                           value="&lt;?php echo $_SERVER[&#39;REMOTE_ADDR&#39;]; ?&gt;">
                    <div class="hidden"><input type="text" name="e-mail"></div>
                    <div class="form-group">
                        <img src="{{ url('/img/templates/offer/pers.svg') }}" alt="decoration">
                        <input type="text" name="name" class="form-control required"
                               data-validation="invalid">
                    </div>
                    <div class="form-group">
                        <img src="{{ url('/img/templates/offer/phone.svg') }}" alt="decoration">
                        <input type="tel" name="phone" class="form-control required inp"
                               data-validation="invalid">
                        <input type="hidden" name="type" value="Заказать звонок">
                    </div>
                    <div class="form-group">
                        <img src="{{ url('/img/templates/offer/write.svg') }}" alt="decoration">
                        <textarea name="text" class="form-control required inp"
                                  data-validation="invalid"></textarea>
                        <input type="hidden" name="type" value="Заказать звонок">
                    </div>
                    <div class="button">
                        <button type="submit" name="send" class="btn disabled darkblue-button" disabled="">
                            <span>Отправить запрос</span></button>
                    </div>
                    <p class="agree">Заполняя форму, вы соглашаетесь на обработку персональных данных (ст.9 ФЗ от 27.07.2006 №152-ФЗ «О персональных данных»)</p>
                </form>
            </div>
        </div>
    </div>
</section>
