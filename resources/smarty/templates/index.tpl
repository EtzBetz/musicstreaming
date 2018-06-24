{include file="header.tpl"}
<div class="content--set-column">
    {if !isset($username, $userId)}
        <div class="content--set-row content--center-align">
            <span class="text--title index__title">Jetzt registrieren und deine Musik mit der Community teilen!</span>
        </div>
    {/if}
    <div class="content--set-row">
        <span class="text--title">Derzeit beliebte Inhalte</span>
    </div>
    <div class="content--set-row">
        <span class="">Alben</span>
    </div>
    <div class="content--set-row">
        {foreach $popularAlbums as $album}
            <div class="card card--no-padding card--small">
                <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$album->getCover()->getFilename()}"/>
                <a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}" class="content--center-align button--reset-uppercase">{$album->getName()}</a> <span>{$album->getSongVisits()} Songaufrufe</span>
            </div>
            {if $album@index > 5}
                {break}
            {/if}
        {/foreach}
    </div>
    <div class="content--set-row">
        <span class="">Singles</span>
    </div>
    <div class="content--set-row">
        {foreach $popularSingles as $song}
            <div class="card card--no-padding card--small">
                <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$song->getCover()->getFilename()}"/>
                <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="content--center-align button--reset-uppercase">{$song->getName()}</a> <span>{$song->getVisits()} Aufrufe</span>
            </div>
            {if $song@index > 5}
                {break}
            {/if}
        {/foreach}
    </div>
    <div class="content--set-row">
        <span class="text--title">Die neuesten Inhalte</span>
    </div>
    <div class="content--set-row">
        <span class="">Alben</span>
    </div>
    <div class="content--set-row">
        {foreach $albums as $album}
            <div class="card card--no-padding card--small">
                <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$album->getCover()->getFilename()}"/>
                <a href="{$configArr.urls.album}&{$configArr.urls.id}{$album->getId()}" class="content--center-align button--reset-uppercase">{$album->getName()}</a>
            </div>
            {if $album@index > 5}
                {break}
            {/if}
        {/foreach}
    </div>
    <div class="content--set-row">
        <span class="">Singles</span>
    </div>
    <div class="content--set-row">
        {foreach $songs as $song}
            <div class="card card--no-padding card--small">
                <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$song->getCover()->getFilename()}"/>
                <a href="{$configArr.urls.song}&{$configArr.urls.id}{$song->getId()}" class="content--center-align button--reset-uppercase">{$song->getName()}</a>
            </div>
            {if $song@index > 5}
                {break}
            {/if}
        {/foreach}
    </div>
    <div class="content--set-row">
        <span class="">Playlists</span>
    </div>
    <div class="content--set-row">
        {foreach $playlists as $playlist}
            <div class="card card--no-padding card--small">
                <img class="song__cover" src="{$configArr["urls"]["coverDirectory"]}{$playlist->getSong(0)->getCover()->getFilename()}"/>
                <a href="{$configArr.urls.playlist}&{$configArr.urls.id}{$playlist->getId()}" class="content--center-align button--reset-uppercase">{$playlist->getName()}</a>
            </div>
            {if $playlist@index > 5}
                {break}
            {/if}
        {/foreach}
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
</div>
{include file="footer.tpl"}