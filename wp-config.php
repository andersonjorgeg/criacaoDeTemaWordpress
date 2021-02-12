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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         ')ucavAy#!Ja64__;[0w$S%HsC;lH&N4/-Y0.Gm!u<}[lh77c^{h}WaF?Y;q`ltZq' );
define( 'SECURE_AUTH_KEY',  'T//eN_XA;SF1@fmW$[|WyoBfoL^ju]/9|,}&gmaShyRmE0Z;p#X%d3Ij/(5%26o;' );
define( 'LOGGED_IN_KEY',    'f$dG:[VU4q~Gc5*r!r/+ug?Tx1=,R2h[e;6,F-@qZT;-@ JTCWNS9l%E&!xCLLb-' );
define( 'NONCE_KEY',        'ItJN{Lo`( ~p8!^Y*dRl*d|L31Ul4X.s04GJS>SxPqmTH>5.Y$En5LLJfrhKmK&d' );
define( 'AUTH_SALT',        'USyNNq-uQF1el[hI/-8~OWW-[T+lb1uj*.*NYGW`A*ZZ7d/NU]S.%qWnKWY7kgmH' );
define( 'SECURE_AUTH_SALT', '6SFy1@GAl$,6Rj595Tc:w.*HR?n~:y|o~ +,~~ XQ@H9p/!~o,!O?Lq64d7^+rbR' );
define( 'LOGGED_IN_SALT',   '~%l&f>dK!|ow<o^k}W;z%jw/9MtM3KSjlQE2T+pDZ?[9)WZ#pHW79,D/z:j?KVl[' );
define( 'NONCE_SALT',       '2**aK>|FnieiFhL%N$t0a/_{-nS[XKmsor~iPn!-M<}^Us-t-WTMJ 80mOdg/Q><' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
