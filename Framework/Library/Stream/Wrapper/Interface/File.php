<?php

/**
 * Hoa Framework
 *
 *
 * @license
 *
 * GNU General Public License
 *
 * This file is part of Hoa Open Accessibility.
 * Copyright (c) 2007, 2010 Ivan ENDERLIN. All rights reserved.
 *
 * HOA Open Accessibility is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * HOA Open Accessibility is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with HOA Open Accessibility; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 *
 * @category    Framework
 * @package     Hoa_Stream
 * @subpackage  Hoa_Stream_Wrapper_Interface_File
 *
 */

/**
 * Hoa_Framework
 */
require_once 'Framework.php';

/**
 * Interface Hoa_Stream_Wrapper_Interface_File.
 *
 * Interface for “file stream wrapper” class.
 *
 * @author      Ivan ENDERLIN <ivan.enderlin@hoa-project.net>
 * @copyright   Copyright (c) 2007, 2010 Ivan ENDERLIN.
 * @license     http://gnu.org/licenses/gpl.txt GNU GPL
 * @since       PHP 5
 * @version     0.1
 * @package     Hoa_Stream
 * @subpackage  Hoa_Stream_Wrapper_Interface_File
 */

interface Hoa_Stream_Wrapper_Interface_File {

    /**
     * Close directory handle.
     * This method is called in to closedir().
     * Any resources which were locked, or allocated, during opening and use of
     * the directory stream should be released.
     *
     * @access  public
     * @return  bool
     */
    public function dir_closedir ( );

    /**
     * Open directory handle.
     * This method is called in response to opendir().
     *
     * @access  public
     * @param   string  $path       Specifies the URL that was passed to opendir().
     * @param   int     $options    Whether or not to enforce safe_mode (0x04).
     * @return  bool
     */
    public function dir_opendir ( $path, $options );

    /**
     * Read entry from directory handle.
     * This method is called in response to readdir().
     *
     * @access  public
     * @return  mixed
     */
    public function dir_readdir ( );

    /**
     * Rewind directory handle.
     * This method is called in response to rewinddir().
     * Should reset the output generated by self::dir_readdir, i.e. the next
     * call to self::dir_readdir should return the first entry in the location
     * returned by self::dir_opendir.
     *
     * @access  public
     * @return  bool
     */
    public function dir_rewinddir ( );

    /**
     * Create a directory.
     * This method is called in response to mkdir().
     *
     * @access  public
     * @param   string  $path       Directory which should be created.
     * @param   int     $mode       The value passed to mkdir().
     * @param   int     $options    A bitwise mask of values.
     * @return  bool
     */
    public function mkdir ( $path, $mode, $options );

    /**
     * Rename a file or directory.
     * This method is called in response to rename().
     * Should attempt to rename $from to $to.
     *
     * @access  public
     * @param   string  $from    The URL to current file.
     * @param   string  $to      The URL which $from should be renamed to.
     * @return  bool
     */
    public function rename ( $from, $to );

    /**
     * Remove a directory.
     * This method is called in response to rmdir().
     *
     * @access  public
     * @param   string  $path       The directory URL which should be removed.
     * @param   int     $options    A bitwise mask of values.
     * @return  bool
     */
    public function rmdir ( $path, $options );

    /**
     * Delete a file.
     * This method is called in response to unlink().
     *
     * @access  public
     * @param   string  $path    The file URL which should be deleted.
     * @return  bool
     */
    public function unlink ( $path );

    /**
     * Retrieve information about a file.
     * This method is called in response to all stat() related functions.
     *
     * @access  public
     * @param   string  $path     The file URL which should be retrieve
     *                            information about.
     * @param   int     $flags    Holds additional flags set by the streams API.
     *                            It can hold one or more of the following
     *                            values OR'd together.
     *                            STREAM_URL_STAT_LINK: for resource with the
     *                            ability to link to other resource (such as an
     *                            HTTP location: forward, or a filesystem
     *                            symlink). This flag specified that only
     *                            information about the link itself should be
     *                            returned, not the resource pointed to by the
     *                            link. This flag is set in response to calls to
     *                            lstat(), is_link(), or filetype().
     *                            STREAM_URL_STAT_QUIET: if this flag is set,
     *                            our wrapper should not raise any errors. If
     *                            this flag is not set, we are responsible for
     *                            reporting errors using the trigger_error()
     *                            function during stating of the path.
     * @return  array
     */
    public function url_stat ( $path, $flags );
}
