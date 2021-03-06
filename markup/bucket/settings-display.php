<?php
	$page_title = "Ushahidi press coverage";
	$template_type = "settings";
	include $_SERVER['DOCUMENT_ROOT'].'/markup/_includes/header.php';
?>

	<hgroup class="page-title bucket-title cf">
		<div class="center">
			<div class="page-h1 col_9">
				<h1><?php print $page_title; ?> <em>settings</em></h1>
				<div class="rundown-people">
					<h2>Collaborators on this bucket</h2>
					<ul>
						<li><a href="#" class="avatar-wrap"><img src="/markup/images/content/avatar1.png" /></a></li>
						<li><a href="#" class="avatar-wrap"><img src="/markup/images/content/avatar2.png" /></a></li>
					</ul>
				</div>
			</div>
			<div class="page-actions col_3">
				<h2 class="back">
					<a href="/markup/bucket/">
						<span class="icon"></span>
						Return to bucket
					</a>
				</h2>
				<h2 class="discussion">
					<a href="/markup/bucket/discussion.php">
						<span class="icon"></span>
						Discussion
					</a>
				</h2>
			</div>
		</div>
	</hgroup>

	<nav class="page-navigation cf">
		<div class="center">
			<div id="page-views" class="settings touchcarousel col_12">
				<ul class="touchcarousel-container">
					<li class="touchcarousel-item"><a href="/markup/bucket/settings-collaborators.php">Collaborators</a></li>
					<li class="touchcarousel-item active"><a href="/markup/bucket/settings-display.php">Display</a></li>
					<li class="touchcarousel-item"><a href="/markup/bucket/settings-permissions.php">Permissions</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="content" class="settings cf">
		<div class="center">
			<div class="col_12">
				<article class="container base">
					<header class="cf">
						<div class="property-title">
							<h1>Name</h1>
						</div>
					</header>
					<section class="property-parameters">
						<div class="parameter">
							<label for="river_name">
								<p class="field">Display name</p>
								<input type="text" value="<?php print $page_title; ?>" name="river_name" />
							</label>
						</div>
						<div class="parameter">
							<label for="river_url">
								<p class="field">URL</p>
								<input type="text" value="ushahidi-at-sxsw" name="river_url" />
							</label>
						</div>
					</section>
				</article>
	
				<article class="container base">
					<header class="cf">
						<div class="property-title">
							<h1>Default view</h1>
						</div>
					</header>
					<section class="property-parameters">
						<div class="parameter">
							<select>
								<option>Drops</option>
								<option>List</option>
								<option>Photos</option>
								<option>Timeline</option>
							</select>
						</div>
					</section>
				</article>
			</div>
		</div>
	</div>

<div id="modal-container">
	<div class="modal-window"></div>
	<div class="modal-fade"></div>
</div>

</body>
</html>