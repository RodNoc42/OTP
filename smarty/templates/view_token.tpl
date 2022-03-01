{if $valid}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>The password is:<br />
            {$token}
        </p>
    </header>
{elseif $usedtime>0}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>You can only view this password once<br />
            It was viewed at {$usedtime|date_format:"%d.%m.%Y %H:%M:%S"}
        </p>
    </header>
{else}
    <header id="header">
        <h1>One Time Password Access</h1>
        <p>This password does not exists</p>
    </header>
{/if}