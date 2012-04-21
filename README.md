PHP Recursive Lowercase directory and contents
==============================================

Lowercase a directory and all its subdirs in one little script run. Particularly practical for migration of directories from FAT filesystems to case sensitive filesystems.

Uses exec() instead of move() for speed.
Also lowercases the first directory given.

WARNING: there is no error check, so don't f*** up the only parameter you can give to this script, otherwise you are s****** :-)

LGPL License. Use at your own risks.
