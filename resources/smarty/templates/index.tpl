{include file="header.tpl"}
{$maxCards = 20}

<div class="content--set-column">
    {if !isset($username, $userId)}
        <div class="content--set-row content--center-align">
            <span class="text--title index__title">Jetzt registrieren und deine Musik mit der Community teilen!</span>
        </div>
    {/if}
    <div class="index__category-title content--set-row">
        <span class="">Derzeit beliebte Inhalte</span>
    </div>
    <div class="index__category content--set-row">
        <span class="">Alben:</span>
    </div>




    <div>
        <div class="index__container-navigation">
            <button onclick="scrollHorizontal(this,'left')" class="index__icon-left"><svg viewBox='0 0 24 24'><path></path></svg></button>
            <button onclick="scrollHorizontal(this,'right')" class="index__icon-right"><svg viewBox='0 0 24 24'><path></path></svg></button>
        </div>
        <div id="container" class="content--set-row content--whole-column content--add-horizontal-scroll" onload="checkScroll(this)" onscroll="checkScroll(this)">
            {foreach $popularAlbums as $album}
                <div class="card card--no-padding card--small">
                    <a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}" class="button--reset-uppercase">
                        <img class="song_cover--small" src="{$configArr["urls"]["coverDirectory"]}{$album->getCover()->getFilename()}"/>
                        <div class="card__overlay">
                            <span class="card__artist">von {$album->getArtist()->getName()}</span>
                            <span class="card__title">{$album->getName()}</span>
                        </div>
                    </a>
                </div>
                {if $album@index > $maxCards - 2}
                    {break}
                {/if}
            {/foreach}
            <div style="width:0;">&nbsp;</div>
        </div>
    </div>








    <div class="index__category content--set-row">
        <span class="">Singles:</span>
    </div>
    <div>
        <div class="index__container-navigation">
            <button onclick="scrollHorizontal(this,'left')" class="index__icon-left"><svg viewBox='0 0 24 24'><path></path></svg></button>
            <button onclick="scrollHorizontal(this,'right')" class="index__icon-right"><svg viewBox='0 0 24 24'><path></path></svg></button>
        </div>
        <div class="content--set-row content--whole-column content--add-horizontal-scroll" onscroll="checkScroll(this)">
            {foreach $popularSingles as $song}
                <div class="card card--no-padding card--small">
                    <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="button--reset-uppercase">
                        <img class="song_cover--small" src="{$configArr["urls"]["coverDirectory"]}{$song->getCover()->getFilename()}"/>
                        <div class="card__overlay">
                            <span class="card__artist">von {$song->getArtist()->getName()}</span>
                            <span class="card__title">{$song->getName()}</span>
                        </div>
                    </a>
                </div>
                {if $song@index > $maxCards - 2}
                    {break}
                {/if}
            {/foreach}
            <div style="width:0;">&nbsp;</div>
        </div>
    </div>
    <div class="index__category content--set-row">
        <span class="text--title">Die neuesten Inhalte</span>
    </div>
    <div class="index__category content--set-row">
        <span class="">Alben:</span>
    </div>
    <div>
        <div class="index__container-navigation">
            <button onclick="scrollHorizontal(this,'left')" class="index__icon-left"><svg viewBox='0 0 24 24'><path></path></svg></button>
            <button onclick="scrollHorizontal(this,'right')" class="index__icon-right"><svg viewBox='0 0 24 24'><path></path></svg></button>
        </div>
        <div class="content--set-row content--whole-column content--add-horizontal-scroll" onscroll="checkScroll(this)">
            {foreach $albums as $album}
                <div class="card card--no-padding card--small">
                    <a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}" class="button--reset-uppercase">
                        <img class="song_cover--small" src="{$configArr["urls"]["coverDirectory"]}{$album->getCover()->getFilename()}"/>
                        <div class="card__overlay">
                            <span class="card__artist">von {$album->getArtist()->getName()}</span>
                            <span class="card__title">{$album->getName()}</span>
                        </div>
                    </a>
                </div>
                {if $album@index > $maxCards - 2}
                    {break}
                {/if}
            {/foreach}
            <div style="width:0;">&nbsp;</div>
        </div>
    </div>
    <div class="index__category content--set-row">
        <span class="">Singles:</span>
    </div>
    <div>
        <div class="index__container-navigation">
            <button onclick="scrollHorizontal(this,'left')" class="index__icon-left"><svg viewBox='0 0 24 24'><path></path></svg></button>
            <button onclick="scrollHorizontal(this,'right')" class="index__icon-right"><svg viewBox='0 0 24 24'><path></path></svg></button>
        </div>
        <div class="content--set-row content--whole-column content--add-horizontal-scroll" onscroll="checkScroll(this)">
            {foreach $songs as $song}
                <div class="card card--no-padding card--small">
                    <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="button--reset-uppercase">
                        <img class="song_cover--small" src="{$configArr["urls"]["coverDirectory"]}{$song->getCover()->getFilename()}"/>
                        <div class="card__overlay">
                            <span class="card__artist">von {$song->getArtist()->getName()}</span>
                            <span class="card__title">{$song->getName()}</span>
                        </div>
                    </a>
                </div>
                {if $song@index > $maxCards - 2}
                    {break}
                {/if}
            {/foreach}
            <div style="width:0;">&nbsp;</div>
        </div>
    </div>
    <div class="index__category content--set-row">
        <span class="">Playlists:</span>
    </div>
        <div>
            <div class="index__container-navigation">
                <button onclick="scrollHorizontal(this,'left')" class="index__icon-left"><svg viewBox='0 0 24 24'><path></path></svg></button>
                <button onclick="scrollHorizontal(this,'right')" class="index__icon-right"><svg viewBox='0 0 24 24'><path></path></svg></button>
            </div>
            <div class="content--set-row content--whole-column content--add-horizontal-scroll" onscroll="checkScroll(this)">
            {foreach $playlists as $playlist}
                <div class="card card--no-padding card--small">
                    <a href="{$configArr.urls.playlist}&{$configArr.urls.id}{$playlist->getId()}" class="button--reset-uppercase">
                        <img class="song_cover--small" src="{$configArr["urls"]["coverDirectory"]}{$playlist->getSong(0)->getCover()->getFilename()}"/>
                        <div class="card__overlay">
                            <span class="card__artist">von {$playlist->getUser()->getUsername()}</span>
                            <span class="card__title">{$playlist->getName()}</span>
                        </div>
                    </a>
                </div>
                {if $playlist@index > $maxCards - 2}
                    {break}
                {/if}
            {/foreach}
                <div style="width:0;">&nbsp;</div>
            </div>
        </div>
</div>
    {*<div class="content--set-row">*}
        {*<span class="text--title">Vorschläge für dich</span>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<span class="">Alben</span>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<div class="card card--no-padding">*}
            {*Lied*}
        {*</div>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<span class="">Singles</span>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<div class="card card--no-padding">*}
            {*Lied*}
        {*</div>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<span class="">Playlists</span>*}
    {*</div>*}
    {*<div class="content--set-row">*}
        {*<div class="card card--no-padding">*}
            {*Lied*}
        {*</div>*}
    {*</div>*}
{include file="footer.tpl"}