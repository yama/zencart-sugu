<?php
 /*
  * Copyright (C) 2006 NICOS_CONVENI INC.
  *
  * This program is free software; you can redistribute it and/or modify
  * it under the terms of the GNU General Public License as published by
  * the Free Software Foundation; either version 2 of the License, or
  * (at your option) any later version.
  *
  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.
  *
  * You should have received a copy of the GNU General Public License
  * along with Shigeo; if not, write to the Free Software
  * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
  *
  * $Id$
  */
//

  define('MODULE_PAYMENT_DIGITALCHECK_PE_TEXT_TITLE', 'Settlement of Pay-easy(Digitalcheck)');
  define('MODULE_PAYMENT_DIGITALCHECK_PE_TEXT_DESCRIPTION', 'Digitalcheck: The function of the Pay-easy settlement is offered.<br/>'
                                                           .'<br/>'
                                                           .'Please contact the following me when you apply.<br/>'
                                                           .'・入金通知URL<br/>'
                                                           .'　'.HTTPS_SERVER.DIR_WS_HTTPS_CATALOG.'extras/digitalcheck_pe_finish_payment.php<br/>'
                                                           .'・入金キャンセル通知URL<br/>'
                                                           .'　'.HTTPS_SERVER.DIR_WS_HTTPS_CATALOG.'extras/digitalcheck_pe_cancel.php<br/>'
                                                           .'・決済完了時戻り先URL<br/>'
                                                           .'　'.HTTP_SERVER.DIR_WS_HTTPS_CATALOG.'index.php?main_page=checkout_process<br/>'
                                                           .'・キャンセル時戻り先URL <br/>'
                                                           .'　'.HTTP_SERVER.DIR_WS_HTTPS_CATALOG.'index.php?main_page=checkout_payment<br/>'
                                                           );
?>
