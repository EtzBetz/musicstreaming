{include file="header.tpl"}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card">
            <form action="{$configArr.urls.add_song}&{$configArr.urls.do}upload" onsubmit="return validateForm()" method="post" class="content--set-column" enctype="multipart/form-data">
                <p class="text--title content--center-align">Neuen Song hochladen</p>
                <div class="card__column content--set-column">
                    <p class="card__label">Musikdatei</p>
                    <input class="card__input--file" type="file" id="musicfile" name="musicfile" required>
                </div>
                <div class="card__column content--set-column">
                    <p class="card__label">Songcover</p>
                    <input class="card__input--file" type="file" id="musiccover" name="musiccover" required>
                </div>
                <div class="card__column content--set-column">
                    <select id="artist" name="artist" required>
                        {html_options options=$artists}
                    </select>
                </div>
                <div class="card__column content--set-column">
                    <select id="album" name="album" required disabled>
                    </select>
                </div>
                <div class="card__column content--set-column">
                    <input class="card__input" placeholder="{$configArr.strings.musictitle}" type="text" alt="{$configArr.strings.musictitle}" pattern="[A-z0-9À-ž\s]{ldelim}3,64{rdelim}" id="title" name="title" required>
                    <span class="card__input__warning">{$configArr.strings.enterValidTitle}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                </div>
                <div class="card__column content--set-column">
                    <select id="genre" name="genre" required>
                        {html_options options=$genres}
                    </select>
                </div>
                <div class="card__column content--set-column">
                    <textarea class="card__input card__input--textarea" placeholder="{$configArr.strings.songtext}" id="songtext" name="songtext" required></textarea>
                </div>
                <div>
                    <button class="card__button--submit" type="submit">{$configArr.strings.upload}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="footer.tpl"}