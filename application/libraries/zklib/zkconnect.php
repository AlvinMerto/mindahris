<?php
    function zkconnect($self) {
        $command = CMD_CONNECT;
        $command_string = '';
        $chksum = 0;
        $session_id = 0;
        $reply_id = -1 + USHRT_MAX;

        $buf = $self->createHeader($command, $chksum, $session_id, $reply_id, $command_string);
       	
        socket_sendto($self->zkclient, $buf, strlen($buf), 0, $self->ip, $self->port);
        
        try {
            @socket_recvfrom($self->zkclient, $self->data_recv, 1024, 0, $self->ip, $self->port);
		
            if ( strlen( $self->data_recv ) > 0 ) {
				
                $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6', substr( $self->data_recv, 0, 8 ) );
                
                $self->session_id =  hexdec( $u['h6'].$u['h5'] );
				
                return $self->checkValid( $self->data_recv );
            } else 
                return FALSE;
        } catch(ErrorException $e) {
            return FALSE;
        } catch(exception $e) {
            return FALSE;
        }
    }

    function zkdisconnect($self) {
        $command = CMD_EXIT;
        $command_string = '';
        $chksum = 0;
        $session_id = $self->session_id;
        
        $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6/H2h7/H2h8', substr( $self->data_recv, 0, 8) );
        $reply_id = hexdec( $u['h8'].$u['h7'] );
        
        $buf = $self->createHeader($command, $chksum, $session_id, $reply_id, $command_string);
        
        
        socket_sendto($self->zkclient, $buf, strlen($buf), 0, $self->ip, $self->port);
        try {
            @socket_recvfrom($self->zkclient, $self->data_recv, 1024, 0, $self->ip, $self->port);
        
            return $self->checkValid( $self->data_recv );
        } catch(ErrorException $e) {
            return FALSE;
        } catch(Exception $e) {
            return FALSE;
        }
    }
?>
