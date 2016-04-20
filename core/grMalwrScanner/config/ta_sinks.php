<?php
	$NAME_XSS = 'Cross-Site Scripting';
	$F_XSS = array(
		'echo'							=> array(array(0), $F_SECURING_XSS), 
		'print'							=> array(array(1), $F_SECURING_XSS),
		'print_r'						=> array(array(1), $F_SECURING_XSS),
		'exit'							=> array(array(1), $F_SECURING_XSS),
		'die'							=> array(array(1), $F_SECURING_XSS),
		'printf'						=> array(array(0), $F_SECURING_XSS),
		'vprintf'						=> array(array(0), $F_SECURING_XSS),
		'trigger_error'					=> array(array(1), $F_SECURING_XSS),
		'user_error'					=> array(array(1), $F_SECURING_XSS),
		'odbc_result_all'				=> array(array(2), $F_SECURING_XSS),
		'ovrimos_result_all'			=> array(array(2), $F_SECURING_XSS),
		'ifx_htmltbl_result'			=> array(array(2), $F_SECURING_XSS)
	);
	
	$NAME_HTTP_HEADER = 'HTTP Response Splitting';
    $F_HTTP_HEADER = array(
		'header' 						=> array(array(1), array())
	);
	
	$NAME_SESSION_FIXATION = 'Session Fixation';
    $F_SESSION_FIXATION = array(
		'setcookie' 					=> array(array(2), array()),
		'setrawcookie' 					=> array(array(2), array()),
		'session_id' 					=> array(array(1), array())
	);
	
	$NAME_CODE = 'Code Execution';
	$F_CODE = array(
		'assert' 						=> array(array(1), array()),
		'create_function' 				=> array(array(1,2), array()),
		'eval' 							=> array(array(1), array()),
		'mb_ereg_replace'				=> array(array(1,2), $F_SECURING_PREG),
		'mb_eregi_replace'				=> array(array(1,2), $F_SECURING_PREG),
		'preg_filter'					=> array(array(1,2), $F_SECURING_PREG),
		//'preg_replace'					=> array(array(1,2), $F_SECURING_PREG),
		//'preg_replace_callback'			=> array(array(1), $F_SECURING_PREG),		
	);
	
	$NAME_REFLECTION = 'Reflection Injection';
	$F_REFLECTION = array(
		'call_user_func'				=> array(array(1,2), array()),
		'call_user_func_array'			=> array(array(1,2), array()),
	);
	
	$NAME_FILE_INCLUDE = 'File Inclusion';
	$F_FILE_INCLUDE = array(
		'include' 						=> array(array(1), $F_SECURING_FILE),
		'include_once' 					=> array(array(1), $F_SECURING_FILE),
		'parsekit_compile_file'			=> array(array(1), $F_SECURING_FILE),
		'php_check_syntax' 				=> array(array(1), $F_SECURING_FILE),	
		'require' 						=> array(array(1), $F_SECURING_FILE),
		'require_once' 					=> array(array(1), $F_SECURING_FILE),
		'runkit_import'					=> array(array(1), $F_SECURING_FILE),
		'set_include_path' 				=> array(array(1), $F_SECURING_FILE),
		'virtual' 						=> array(array(1), $F_SECURING_FILE)		
	);

	$NAME_FILE_READ = 'File Disclosure';
	$F_FILE_READ = array(
		'bzread'						=> array(array(1), $F_SECURING_FILE), 
		'bzflush'						=> array(array(1), $F_SECURING_FILE), 
		'dio_read'						=> array(array(1), $F_SECURING_FILE),   
		'eio_readdir'					=> array(array(1), $F_SECURING_FILE),  
		'fdf_open'						=> array(array(1), $F_SECURING_FILE), 
		'file'							=> array(array(1), $F_SECURING_FILE), 
		'file_get_contents'				=> array(array(1), $F_SECURING_FILE),  
		'finfo_file'					=> array(array(1,2), array()), 
		'fflush'						=> array(array(1), $F_SECURING_FILE),
		'fgetc'							=> array(array(1), $F_SECURING_FILE),
		'fgetcsv'						=> array(array(1), $F_SECURING_FILE),
		'fgets'							=> array(array(1), $F_SECURING_FILE),
		'fgetss'						=> array(array(1), $F_SECURING_FILE),
		'fread'							=> array(array(1), $F_SECURING_FILE), 
		'fpassthru'						=> array(array(1,2), array()), 
		'fscanf'						=> array(array(1), $F_SECURING_FILE), 
		'ftok'							=> array(array(1), $F_SECURING_FILE),
		'get_meta_tags'					=> array(array(1), $F_SECURING_FILE), 
		'glob'							=> array(array(1), array()), 
		'gzfile'						=> array(array(1), $F_SECURING_FILE), 
		'gzgetc'						=> array(array(1), $F_SECURING_FILE),
		'gzgets'						=> array(array(1), $F_SECURING_FILE), 
		'gzgetss'						=> array(array(1), $F_SECURING_FILE), 
		'gzread'						=> array(array(1), $F_SECURING_FILE),  
		'gzpassthru'					=> array(array(1), $F_SECURING_FILE), 
		'highlight_file'				=> array(array(1), $F_SECURING_FILE),  
		'imagecreatefrompng'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromjpg'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgif'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd2'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd2part'		=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd'				=> array(array(1), $F_SECURING_FILE),  
		'opendir'						=> array(array(1), $F_SECURING_FILE),  
		'parse_ini_file' 				=> array(array(1), $F_SECURING_FILE),	
		'php_strip_whitespace'			=> array(array(1), $F_SECURING_FILE),	
		'readfile'						=> array(array(1), $F_SECURING_FILE), 
		'readgzfile'					=> array(array(1), $F_SECURING_FILE), 
		'readlink'						=> array(array(1), $F_SECURING_FILE),		
		//'stat'						=> array(array(1), array()),
		'scandir'						=> array(array(1), $F_SECURING_FILE),
		'show_source'					=> array(array(1), $F_SECURING_FILE),
		'simplexml_load_file'			=> array(array(1), $F_SECURING_FILE),
		'stream_get_contents'			=> array(array(1), $F_SECURING_FILE),
		'stream_get_line'				=> array(array(1), $F_SECURING_FILE),
		'xdiff_file_bdiff'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_bpatch'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_diff_binary'		=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_diff'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_merge3'				=> array(array(1,2,3), $F_SECURING_FILE),
		'xdiff_file_patch_binary'		=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_patch'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_rabdiff'			=> array(array(1,2), $F_SECURING_FILE),
		'yaml_parse_file'				=> array(array(1), $F_SECURING_FILE),
		'zip_open'						=> array(array(1), $F_SECURING_FILE)
	);
	
	$NAME_FILE_AFFECT = 'File Manipulation';
	$F_FILE_AFFECT = array(
		'bzwrite'						=> array(array(2), array()),
		'chmod'							=> array(array(1), $F_SECURING_FILE),
		'chgrp'							=> array(array(1), $F_SECURING_FILE),
		'chown'							=> array(array(1), $F_SECURING_FILE),
		'copy'							=> array(array(1), array()),
		'dio_write'						=> array(array(1,2), array()),	
		'eio_chmod'						=> array(array(1), $F_SECURING_FILE),
		'eio_chown'						=> array(array(1), $F_SECURING_FILE),
		'eio_mkdir'						=> array(array(1), $F_SECURING_FILE),
		'eio_mknod'						=> array(array(1), $F_SECURING_FILE),
		'eio_rmdir'						=> array(array(1), $F_SECURING_FILE),
		'eio_write'						=> array(array(1,2), array()),
		'eio_unlink'					=> array(array(1), $F_SECURING_FILE),
		'error_log'						=> array(array(3), $F_SECURING_FILE),
		'event_buffer_write'			=> array(array(2), array()),
		'file_put_contents'				=> array(array(1,2), $F_SECURING_FILE),
		'fputcsv'						=> array(array(1,2), $F_SECURING_FILE),
		'fputs'							=> array(array(1,2), $F_SECURING_FILE),	
		'fprintf'						=> array(array(0), array()),	
		'ftruncate'						=> array(array(1), $F_SECURING_FILE),
		'fwrite'						=> array(array(1,2), $F_SECURING_FILE),		
		'gzwrite'						=> array(array(1,2), array()),
		'gzputs'						=> array(array(1,2), array()),
		'loadXML'						=> array(array(1), array()),
		'mkdir'							=> array(array(1), array()),
		'move_uploaded_file'			=> array(array(1,2), $F_SECURING_FILE),	
		'posix_mknod'					=> array(array(1), $F_SECURING_FILE),
		'recode_file'					=> array(array(2,3), $F_SECURING_FILE),	
		'rename'						=> array(array(1,2), $F_SECURING_FILE),
		'rmdir'							=> array(array(1), $F_SECURING_FILE),	
		'shmop_write'					=> array(array(2), array()),
		'touch'							=> array(array(1), $F_SECURING_FILE),
		'unlink'						=> array(array(1), $F_SECURING_FILE),
		'vfprintf'						=> array(array(0), array()),	
		'xdiff_file_bdiff'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_bpatch'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_diff_binary'		=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_diff'				=> array(array(3), $F_SECURING_FILE),	
		'xdiff_file_merge3'				=> array(array(4), $F_SECURING_FILE),
		'xdiff_file_patch_binary'		=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_patch'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_rabdiff'			=> array(array(3), $F_SECURING_FILE),
		'yaml_emit_file'				=> array(array(1,2), $F_SECURING_FILE),
	);

	$NAME_EXEC = 'Command Execution';
	$F_EXEC = array(
		'backticks'						=> array(array(1), $F_SECURING_SYSTEM),
		'exec'							=> array(array(1), $F_SECURING_SYSTEM),
		'expect_popen'					=> array(array(1), $F_SECURING_SYSTEM),
		'passthru'						=> array(array(1), $F_SECURING_SYSTEM),
		'pcntl_exec'					=> array(array(1), $F_SECURING_SYSTEM),
		'popen'							=> array(array(1), $F_SECURING_SYSTEM),
		'proc_open'						=> array(array(1), $F_SECURING_SYSTEM),
		'shell_exec'					=> array(array(1), $F_SECURING_SYSTEM),
		'system'						=> array(array(1), $F_SECURING_SYSTEM),
		'mail'							=> array(array(5), array()), // http://esec-pentest.sogeti.com/web/using-mail-remote-code-execution
		'mb_send_mail'					=> array(array(5), array()),
		'w32api_invoke_function'		=> array(array(1), array()),
		'w32api_register_function'		=> array(array(2), array()),
	);

	$NAME_DATABASE = 'SQL Injection';
	$F_DATABASE = array(
		'dba_open'						=> array(array(1), array()),
		'dba_popen'						=> array(array(1), array()), 
		'dba_insert'					=> array(array(1,2), array()),
		'dba_fetch'						=> array(array(1), array()), 
		'dba_delete'					=> array(array(1), array()), 
		'dbx_query'						=> array(array(2), $F_SECURING_SQL), 
		'odbc_do'						=> array(array(2), $F_SECURING_SQL),
		'odbc_exec'						=> array(array(2), $F_SECURING_SQL),
		'odbc_execute'					=> array(array(2), $F_SECURING_SQL),	
		'db2_exec' 						=> array(array(2), $F_SECURING_SQL),
		'db2_execute'					=> array(array(2), $F_SECURING_SQL),
		'fbsql_db_query'				=> array(array(2), $F_SECURING_SQL),
		'fbsql_query'					=> array(array(1), $F_SECURING_SQL), 
		'ibase_query'					=> array(array(2), $F_SECURING_SQL), 
		'ibase_execute'					=> array(array(1), $F_SECURING_SQL), 
		'ifx_query'						=> array(array(1), $F_SECURING_SQL), 
		'ifx_do'						=> array(array(1), $F_SECURING_SQL),
		'ingres_query'					=> array(array(2), $F_SECURING_SQL),
		'ingres_execute'				=> array(array(2), $F_SECURING_SQL),
		'ingres_unbuffered_query'		=> array(array(2), $F_SECURING_SQL),
		'msql_db_query'					=> array(array(2), $F_SECURING_SQL), 
		'msql_query'					=> array(array(1), $F_SECURING_SQL),
		'msql'							=> array(array(2), $F_SECURING_SQL), 
		'mssql_query'					=> array(array(1), $F_SECURING_SQL), 
		'mssql_execute'					=> array(array(1), $F_SECURING_SQL),
		'mysql_db_query'				=> array(array(2), $F_SECURING_SQL),  
		'mysql_query'					=> array(array(1), $F_SECURING_SQL), 
		'mysql_unbuffered_query'		=> array(array(1), $F_SECURING_SQL), 
		'mysqli_stmt_execute'			=> array(array(1), $F_SECURING_SQL),
		'mysqli_query'					=> array(array(2), $F_SECURING_SQL),
		'mysqli_real_query'				=> array(array(1), $F_SECURING_SQL),
		'mysqli_master_query'			=> array(array(2), $F_SECURING_SQL),
		'oci_execute'					=> array(array(1), array()),
		'ociexecute'					=> array(array(1), array()),
		'ovrimos_exec'					=> array(array(2), $F_SECURING_SQL),
		'ovrimos_execute'				=> array(array(2), $F_SECURING_SQL),
		'ora_do'						=> array(array(2), array()), 
		'ora_exec'						=> array(array(1), array()), 
		'pg_query'						=> array(array(2), $F_SECURING_SQL),
		'pg_send_query'					=> array(array(2), $F_SECURING_SQL),
		'pg_send_query_params'			=> array(array(2), $F_SECURING_SQL),
		'pg_send_prepare'				=> array(array(3), $F_SECURING_SQL),
		'pg_prepare'					=> array(array(3), $F_SECURING_SQL),
		'sqlite_open'					=> array(array(1), $F_SECURING_SQL),
		'sqlite_popen'					=> array(array(1), $F_SECURING_SQL),
		'sqlite_array_query'			=> array(array(1,2), $F_SECURING_SQL),
		'arrayQuery'					=> array(array(1,2), $F_SECURING_SQL),
		'singleQuery'					=> array(array(1), $F_SECURING_SQL),
		'sqlite_query'					=> array(array(1,2), $F_SECURING_SQL),
		'sqlite_exec'					=> array(array(1,2), $F_SECURING_SQL),
		'sqlite_single_query'			=> array(array(2), $F_SECURING_SQL),
		'sqlite_unbuffered_query'		=> array(array(1,2), $F_SECURING_SQL),
		'sybase_query'					=> array(array(1), $F_SECURING_SQL), 
		'sybase_unbuffered_query'		=> array(array(1), $F_SECURING_SQL)
	);
		
	$NAME_XPATH = 'XPath Injection';
	$F_XPATH = array(
		'xpath_eval'					=> array(array(2), $F_SECURING_XPATH),	
		'xpath_eval_expression'			=> array(array(2), $F_SECURING_XPATH),		
		'xptr_eval'						=> array(array(2), $F_SECURING_XPATH)
	);
		
	$NAME_LDAP = 'LDAP Injection';
	$F_LDAP = array(
		'ldap_add'						=> array(array(2,3), $F_SECURING_LDAP),
		'ldap_delete'					=> array(array(2), $F_SECURING_LDAP),
		'ldap_list'						=> array(array(3), $F_SECURING_LDAP),
		'ldap_read'						=> array(array(3), $F_SECURING_LDAP),
		'ldap_search'					=> array(array(3), $F_SECURING_LDAP)
	);	
			
	$NAME_CONNECT = 'Protocol Injection';
    $F_CONNECT = array(
		'curl_setopt'					=> array(array(2,3), array()),
		'curl_setopt_array' 			=> array(array(2), array()),
		'cyrus_query' 					=> array(array(2), array()),
		'error_log'						=> array(array(3), array()),
		'fsockopen'						=> array(array(1), array()), 
		'ftp_chmod' 					=> array(array(2,3), array()),
		'ftp_exec'						=> array(array(2), array()), 
		'ftp_delete' 					=> array(array(2), array()), 
		'ftp_fget' 						=> array(array(3), array()), 
		'ftp_get'						=> array(array(2,3), array()), 
		'ftp_nlist' 					=> array(array(2), array()), 
		'ftp_nb_fget' 					=> array(array(3), array()), 
		'ftp_nb_get' 					=> array(array(2,3), array()), 
		'ftp_nb_put'					=> array(array(2), array()), 
		'ftp_put'						=> array(array(2,3), array()), 
		'get_headers'					=> array(array(1), array()),
		'imap_open'						=> array(array(1), array()),  
		'imap_mail'						=> array(array(1), array()),
		'mail' 							=> array(array(1,4), array()), 
		'mb_send_mail'					=> array(array(1,4), array()), 
		'ldap_connect'					=> array(array(1), array()),
		'msession_connect'				=> array(array(1), array()),
		'pfsockopen'					=> array(array(1), array()),   
		'session_register'				=> array(array(0), array()),  
		'socket_bind'					=> array(array(2), array()),  
		'socket_connect'				=> array(array(2), array()),  
		'socket_send'					=> array(array(2), array()), 
		'socket_write'					=> array(array(2), array()),  
		'stream_socket_client'			=> array(array(1), array()),  
		'stream_socket_server'			=> array(array(1), array()),
		'printer_open'					=> array(array(1), array())
	);
		
	$NAME_OTHER = 'Possible Flow Control'; 
	$F_OTHER = array(
		'dl' 							=> array(array(1), array()),	
		'ereg'							=> array(array(2), array()), # nullbyte injection affected		
		'eregi'							=> array(array(2), array()), # nullbyte injection affected			
		'ini_set' 						=> array(array(1,2), array()),
		'ini_restore'					=> array(array(1), array()),
		'runkit_constant_redefine'		=> array(array(1,2), array()),
		'runkit_method_rename'			=> array(array(1,2,3), array()),
		'sleep'							=> array(array(1), array()),
		'usleep'						=> array(array(1), array()),
		'extract'						=> array(array(1), array()),
		'mb_parse_str'					=> array(array(1), array()),
		'parse_str'						=> array(array(1), array()),
		'putenv'						=> array(array(1), array()),
		'set_include_path'				=> array(array(1), array()),
		'apache_setenv'					=> array(array(1,2), array()),	
		'define'						=> array(array(1), array()),
		'is_a'							=> array(array(1), array()) // calls __autoload()
	);
	
	$NAME_POP = 'PHP Object Injection';
	$F_POP = array(
		'unserialize'					=> array(array(1), array()), // calls gadgets
		'yaml_parse'					=> array(array(1), array())	 // calls unserialize
	);
?>	