<?php use_helper('a') ?>

<?php if ($editable): ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php endif; ?>

<div itemscope itemtype="http://schema.org/Organization">
	<?php if(isset($values['description'])): ?>
	<span itemprop="description"><?php echo $values['description']; ?></span>
	<?php endif; ?>
	<?php if(isset($values['name'])): ?>
	<span itemprop="name"><?php echo $values['name']; ?></span>
	<?php endif; ?>
	<?php if(isset($values['url'])): ?>
	<a href="<?php echo $values['url']; ?>" itemprop="url"><?php echo $values['url']; ?></a>
	<?php endif; ?>
	<?php if(isset($values['email'])): ?>
	<a href="mailto:<?php echo $values['email']; ?>" itemprop="email"><?php echo $values['email']; ?></a>
	<?php endif; ?>
	<?php if(isset($values['telephone'])): ?>
	<span itemprop="telephone"><?php echo $values['telephone']; ?></span>
	<?php endif; ?>
	<?php if(isset($values['fax_number'])): ?>
	<span itemprop="faxNUmber"><?php echo $values['fax_number']; ?></span>
	<?php endif; ?>
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<?php if(isset($values['street_address'])): ?>
		<span itemprop="streetAddress"><?php echo nl2br($values['street_address']); ?></span>
		<?php endif; ?>
		<?php if(isset($values['post_office_box_number'])): ?>
		<span itemprop="postOfficeBoxNumber"><?php echo $values['post_office_box_number']; ?></span>
		<?php endif; ?>
		<?php if(isset($values['address_locality'])): ?>
		<span itemprop="addressLocality"><?php echo $values['address_locality']; ?></span>
		<?php endif; ?>
		<?php if(isset($values['address_region'])): ?>
		<span itemprop="addressRegion"><?php echo $values['address_region']; ?></span>
		<?php endif; ?>
		<?php if(isset($values['postal_code'])): ?>
		<span itemprop="postalCode"><?php echo $values['postal_code']; ?></span>
		<?php endif; ?>
		<?php if(isset($values['address_country'])): ?>
		<span itemprop="addressCountry"><?php echo $values['address_country']; ?></span>
		<?php endif; ?>
	</div>
</div>