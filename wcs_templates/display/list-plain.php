<?php

/** Template: Display -> Plain List */

?>
<div class="wcs-timetable wcs-timetable--list">
	<h2 v-if="filter_var(options.show_title)">{{options.title}}</h2>
	<ul class="wcs-timetable__list wcs-timetable__parent">
		<template v-if="events_list">
			<li v-for="event in events_list" class="wcs-class"  :class="event | eventCSS">
				<div v-if="event.thumbnail" class='wcs-class__image wcs-modal-call  xtd-shadow--large-normal' :style='"background-image: url(" + event.thumbnail +")"'  v-on:click="openModal( event, options, $event )"></div>
        <div class="wcs-class__inner">
  				<time :datetime="event.start" class="wcs-class__time h4">
  						<span>{{event.start | moment( 'MMMM D' ) }}</span>
							<template v-if="isMultiDay(event)">
								- {{ event.end | moment( 'MMMM D' ) }}
							</template>
  				</time>
  				<div class="wcs-class__meta">
  					<div class="wcs-class__inner-flex">
  						<h3 class="wcs-class__title wcs-modal-call h1" :title="event.title" v-html="event.title" v-on:click="openModal( event, options, $event )"></h3>
  						<div class="wcs-class__time-duration">
  							<span v-if="filter_var(options.show_duration)" class='wcs-class__duration wcs-addons--pipe'>{{event.duration}}</span>
  							<template v-if="filter_var(options.show_wcs_room)"><span class='wcs-addons--pipe'>{{options.label_wcs_room}}</span>
  								<taxonomy-list :options="options" :tax="'wcs_room'" :event="event" v-on:open-modal="openModal"></taxonomy-list>
  							</template>
  							<template v-if="filter_var(options.show_wcs_instructor)"><span class='wcs-addons--pipe'>{{options.label_wcs_instructor}}</span>
  								<taxonomy-list :options="options" :tax="'wcs_instructor'" :event="event" v-on:open-modal="openModal"></taxonomy-list>
  							</template>
  						</div>
  						<div v-if="filter_var(options.show_excerpt)" class="wcs-class__excerpt" v-html="event.excerpt"></div>
  					</div>
  				</div>
        </div>
			</li>
		</template>
		<template v-else>
			<li class="wcs-class wcs-timetable__zero-data">
				<div class="wcs-class__meta">
					<div class="wcs-class__inner-flex">
						<h3>{{options.zero}}</h3>
					</div>
				</div>
			</li>
		</template>
	</ul>
	<button-more v-if="hasMoreButton()" v-on:add-events="addEvents" :more="options.label_more" :color="options.color_special_contrast"></button-more>
</div>
