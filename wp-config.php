<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'sabrestore' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'mysql' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET',  'utf8mb4'  );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'AoT!?ezMZ)D#.iw>wd[tt_F$HVN5/nHG68$1Rj>82| /HRck:FpO<6SwBIU>(7`@' );
define( 'SECURE_AUTH_KEY',  '{LXgkJ/*c lD$A^o7d&31k_hl$s6tKU&B3|9Bj9hdjzOV8!zFp*)OP&f_Rtp<hl|' );
define( 'LOGGED_IN_KEY',    '3]UIL&?x)DjLmo|/DX  ZrJ*a5{u!NkV2.D0C2hh@MCv/550[g OvuAna1wSDg?~' );
define( 'NONCE_KEY',        '_~?N[4WF]L}m$*Gx_8dukmgGwL-[^o4;~D7U`{A#sxUXOUs!AO1p:HAv.!-[u-(J' );
define( 'AUTH_SALT',        'v~A>02*Im-sujlKWVnnGSkPIR:f!,w]$[8Y6_KY+;>%0q*94mm-~9];)1<UzXf1I' );
define( 'SECURE_AUTH_SALT', '00PdlHS%.KU.:==iR+jaYT|t:JU1uHH*_CI=&txD,M7+ON}i,_s=)r~|PsNY*Z ~' );
define( 'LOGGED_IN_SALT',   '<i7GTgr| VmfZVi0g(c@p@`+%O3C>CdOkt&KfPT+&hh2$jXU<.xpC}C]HsrAfZ_J' );
define( 'NONCE_SALT',       '2r6&9gI(S0XJJk&:I~IU8ibSK:?`UQP`/J|Ek1DwHER#*h4`%Nas^<blc4r$]uGt' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
