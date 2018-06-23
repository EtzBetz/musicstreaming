{include file="header.tpl"}
<div class="content--set-column content--center-align">
    <div class="content--set-row content--center-align">
        <div class="card">
            <form action="{$configArr.urls.add_artist}&{$configArr.urls.do}create" onsubmit="return validateForm()" method="post" class="content--set-column">
                <p class="text--title content--center-align">Neuen Künstler hinzufügen</p>
                <div class="card__column content--set-column">
                    <input class="card__input" placeholder="{$configArr.strings.artisttitle}" type="text" alt="{$configArr.strings.artisttitle}" pattern="[A-z0-9À-ž\s]{ldelim}3,64{rdelim}" id="name" name="name" required>
                    <span class="card__input__warning">{$configArr.strings.enterValidArtist}</span> {* TODO: change header info div css to div.info and change this to class="info" *}
                </div>
                <div>
                    <button class="card__button--submit" type="submit">{$configArr.strings.add}</button>
                </div>
            </form>
        </div>
    </div>
</div>
{include file="footer.tpl"}