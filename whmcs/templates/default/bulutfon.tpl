<div class="panel panel-default">
  <div class="panel-heading">Bulutfon Kampanya Kodunuz</div>
  <div class="panel-body text-center">
           {if $message}
                <div class="alert alert-danger" role="alert">{$message}</div>
            {else}
                <h3 style="padding:0;margin:0;">Bulutfon +3 Ay Kampanya Kodunuz</h3>
                {if !$message}
                    <h1 style="text-align:center;">{$userkey}</h1>
                {/if}
            {/if}
            <a href="https://www.bulutfon.com" class="btn btn-success" target="_blank">Bulutfon aboneliğinizi başlatın.</a>
  </div>
</div>
