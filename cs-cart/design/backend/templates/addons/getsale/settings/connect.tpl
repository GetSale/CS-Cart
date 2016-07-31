<fieldset>
    {assign var="getsale_id" value=$getsale_id|default:""}
    {assign var="getsale_email" value=$getsale_email|default:""}
    {assign var="getsale_key" value=$getsale_key|default:""}

    {if $getsale_id}
        <p><b>{__("getsale.success")}</b></p>
    {/if}

    <div id="connect_settings">
        <input type="hidden" name="result_ids"
               value="connect_settings,addon_upgrade"/>
        <div class="control-group">
            <label class="cm-required cm-email"
                   for="elm_getsale_email">{__("email")}:</label>

            <div class="controls">
                <input type="text" id="elm_getsale_email" name="getsale[email]"
                       value="{$getsale_email}" class="input-text-large"
                       size="60" {if $getsale_id}disabled="disabled"{/if}/>
                {if $getsale_id}<img src="{$images_dir}/addons/getsale/images/ok.png">{/if}
            </div>
        </div>

        <div class="control-group">
            <label for="elm_getsale_password" class="cm-required">{__("apikey")}:</label>

            <div class="controls">
                <input type="text" id="elm_getsale_password" name="getsale[apikey]"
                       class="input-text-large" size="32" maxlength="32" value="{$getsale_key}"
                       autocomplete="off" {if $getsale_id}disabled="disabled"{/if}/>
                {if $getsale_id}<img src="{$images_dir}/addons/getsale/images/ok.png">{/if}
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                {include file="buttons/button.tpl" but_role="submit" but_meta="btn-primary cm-skip-avail-switch" but_name="dispatch[addons.getsale_connect]" but_text=__("getsale_connect") but_target_id="connect_settings"}
            </div>
        </div>
        {if !($getsale_id)}
            <p>{__("getsale.help1")}</p>
            <p>{__('getsale.help2')}</p>
        {/if}
        {if $getsale_id}
            <p>{__('getsale.help5')}</p>
        {/if}
        <p>{__('getsale.help3')}</p>
        <p>{__('getsale.help4')}</p>
    </div>

</fieldset>
