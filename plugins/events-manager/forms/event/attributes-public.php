<?php
/*
* Modified from original events manager plugin version: 5.6.6.1 file 'templates/forms/attributes-public.php'
* Copyright (c) 2016, Marcus Sykes
* http://wp-events-plugin.com
* Licence: GPL 2 or later
*
* Modifications by Brad Payne
* Licence GPL 3+
*
* This file is called by templates/forms/event-editor.php to display attribute fields on your event form on your website.
* You can override this file by copying it to /wp-content/themes/yourtheme/plugins/events-manager/forms/event/ and editing it there.
*/
global $EM_Event;
/* @var $EM_Event EM_Event */
$attributes     = em_get_attributes();
$has_deprecated = false;
?>
<?php if ( count( $attributes['names'] ) > 0 ) : ?>
	<?php foreach ( $attributes['names'] as $name ) : ?>
		<div class="event-attributes">
			<label for="em_attributes[<?php echo $name ?>]"><?php echo $name ?></label>
			<?php
			switch ( $name ) {
				case 'Registration Link':
					echo '<p class="margin-up"><i>(if available)</i></p>';
					break;
				case 'Target Audience':
					echo '<p class="margin-up"><i>(For professionals who work with:)</i></p>';
					break;
				case 'Professional Development Certificate Credit Hours':
					echo '<p class="margin-up"><i>(Type a number)</i></p>';
					break;
				default:
					echo '';
			}
			?>
			<?php if ( count( $attributes['values'][ $name ] ) > 1 ): ?>
				<select name="em_attributes[<?php echo $name ?>]">
					<?php foreach ( $attributes['values'][ $name ] as $attribute_val ): ?>
						<?php if ( is_array( $EM_Event->event_attributes ) && array_key_exists( $name, $EM_Event->event_attributes ) && $EM_Event->event_attributes[ $name ] == $attribute_val ): ?>
							<option selected="selected"><?php echo $attribute_val; ?></option>
						<?php else: ?>
							<option><?php echo $attribute_val; ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			<?php else: ?>
				<?php $default_value = ( ! empty( $attributes['values'][ $name ][0] ) ) ? $attributes['values'][ $name ][0] : ''; ?>
				<input type="text" name="em_attributes[<?php echo $name ?>]"
				       value="<?php echo array_key_exists( $name, $EM_Event->event_attributes ) ? esc_attr( $EM_Event->event_attributes[ $name ], ENT_QUOTES ) : ''; ?>"
				       value="<?php echo $default_value; ?>"/>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
<?php endif; ?>