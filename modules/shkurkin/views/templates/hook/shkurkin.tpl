<!-- Shkurkin -->
 <div id="shkurkin">
  <p>Hello,
    {if isset($shkurkin_name) && $shkurkin_name}
      {$shkurkin_name}
    {else}
      World
    {/if}
    !
  </p>
  <a href="{$shkurkin_link}" title="Click this link">Click me!</a>
 </div>
<!-- /Shkurkin -->