<?php

/** Template: Display -> Weekly Schedule */

?>
<div class="wcs-timetable wcs-timetable--week">
	<h2 v-if="filter_var(options.show_title)">{{options.title}}</h2>
	<div class="wcs-timetable__week wcs-timetable__parent">
		<div v-for="day in week" v-if="day.events.length > 0" class="wcs-day" :class="'wcs-day--' + day.day_num">
			<h3 class="wcs-day__title">{{day_name(day.day_num)}}</h3>
			<div class="wcs-timetable__classes">
				<div v-for="event in day.events" class="wcs-class wcs-class--filterable" :class="event | eventCSS | eventSlotCSS(event)">
					<small class="wcs-class__title wcs-modal-call" v-on:click="openModal( event, options, $event )" :title="event.title" v-html="event.title"></small>
					<time class="wcs-class__time" :datetime="event.start" v-html="starting_ending(event)"></time>
					<template v-if="filter_var(options.show_duration)"><br><span class='wcs-class__duration'>{{event.duration}}</span></template>
					<div v-if="filter_var(options.show_wcs_room)">{{options.label_wcs_room}}
						<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openModal"></taxonomy-list>
					</div>
					<div v-if="filter_var(options.show_wcs_instructor)">{{options.label_wcs_instructor}}
						<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openModal"></taxonomy-list>
					</div>
				</div>
			</div><!-- .wcs-timetable__classes -->
			<div class="wcs-timetable__spacer"></div>
		</div><!-- .wcs-day -->
		<div v-show="countWeekEvents(week) == 0" class="wcs-timetable__zero-data wcs-timetable__zero-data-container">
			<h3>{{options.zero}}</h3>
		</div>
	</div><!-- .wcs-timetable__parent -->
</div><!-- .wcs-timetable -->
