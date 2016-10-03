CREATE TABLE IF NOT EXISTS `#__hdwmusic_artists` (
  `id` int(5) NOT NULL AUTO_INCREMENT,  
  `artist_name` varchar(255) NOT NULL,
  `artist_slug` varchar(255) NOT NULL,
  `artist_type` varchar(6) NOT NULL,
  `artist_thumb` varchar(255) NOT NULL,
  `artist_header` text NOT NULL,
  `artist_footer` text NOT NULL,
  `artist_views` int(10) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__hdwmusic_genre` (
  `id` int(5) NOT NULL AUTO_INCREMENT,  
  `genre_name` varchar(255) NOT NULL,
  `genre_slug` varchar(255) NOT NULL,
  `genre_type` varchar(6) NOT NULL,
  `genre_thumb` varchar(255) NOT NULL,
  `genre_header` text NOT NULL,
  `genre_footer` text NOT NULL,
  `genre_views` int(10) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__hdwmusic_albums` (
  `id` int(5) NOT NULL AUTO_INCREMENT,  
  `album_name` varchar(255) NOT NULL,
  `album_slug` varchar(255) NOT NULL,
  `album_type` varchar(6) NOT NULL,
  `album_thumb` varchar(255) NOT NULL,
  `album_cover` varchar(255) NOT NULL,
  `album_artist` varchar(255) NOT NULL,
  `album_genre` varchar(255) NOT NULL,
  `album_header` text NOT NULL,
  `album_footer` text NOT NULL,
  `album_views` int(10) NOT NULL,
  `album_featured` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__hdwmusic_songs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `song_type` varchar(6) NOT NULL,
  `song_file` varchar(255) NOT NULL,
  `song_thumb` varchar(255) NOT NULL,
  `song_title` varchar(255) NOT NULL,
  `song_album` varchar(255) NOT NULL,
  `song_lyrics` text NOT NULL,
  `song_views` int(10) NOT NULL,
  `ordering` int(5) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__hdwmusic_users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_songs` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__hdwmusic_settings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bgcolor` varchar(8) NOT NULL,
  `bordercolor` varchar(8) NOT NULL,
  `overlaycolor` varchar(8) NOT NULL,
  `overlayalpha` varchar(3) NOT NULL,
  `iconcolor` varchar(8) NOT NULL,
  `sliderbgcolor` varchar(8) NOT NULL,
  `slidercolor` varchar(8) NOT NULL,
  `autostart` tinyint(4) NOT NULL,
  `playlistautostart` tinyint(4) NOT NULL,
  `styles` text NOT NULL,
  `rows` int(3) NOT NULL DEFAULT '3',
  `cols` int(3) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;