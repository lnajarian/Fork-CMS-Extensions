{include:{$BACKEND_CORE_PATH}/layout/templates/head.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/structure_start_module.tpl}

<div class="pageTitle">
	<h2>{$lblPhotogallery|ucfirst}: {$lblAddImagesForAlbum|sprintf:{$record.title}}</h2>
</div>

<div class="wizard">
	<ul>
		<li class="beforeSelected"><a href="{$var|geturl:'edit_album'}&amp;id={$record.id}"><b><span>1.</span> {$lblWizardInformation|ucfirst}</b></a></li>
		<li class="selected"><a href="{$var|geturl:'add_images_choose'}&amp;album_id={$record.id}"><b><span>2.</span> {$lblWizardAddImages|ucfirst}</b></a></li>
	</ul>
</div>

{form:choose}

	<div class="box">
		<div class="heading">
			<h3>{$lblOptions|ucfirst}</h3>
		</div>
			<div class="options">
				<ul>
					{iteration:options}
						<li>
							{$options.rbtOptions}
							<label for="{$options.id}">{$options.label}</label>
						</li>
					{/iteration:options}
				</ul>
		</div>
	</div>

	<div class="fullwidthOptions">
		<a href="{$var|geturl:'edit_album'}&amp;id={$record.id}" class="button linkButton">
			<span>{$lblCancel|ucfirst}</span>
		</a>
		<div class="buttonHolderRight">
			<input id="addButton" class="inputButton button mainButton" type="submit" name="add" value="{$lblNext|ucfirst}" />
		</div>
	</div>
 
{/form:choose}

{include:{$BACKEND_CORE_PATH}/layout/templates/structure_end_module.tpl}
{include:{$BACKEND_CORE_PATH}/layout/templates/footer.tpl}