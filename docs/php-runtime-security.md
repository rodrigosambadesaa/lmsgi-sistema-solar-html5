# PHP runtime security

PHP's native HTTP and FTP stream wrappers can expose data in plaintext for mixed-case HTTPS/FTPS schemes or redirect targets (CVE-2026-128064, 19 November 2026). This repository does not pin a PHP interpreter. Install PHP 8.2.36, 8.3.37, 8.4.28, 8.5.13 or a later supported, patched release; a vendor-confirmed backport is also acceptable. Verify both CLI (`php -v`) and web SAPI, restart relevant services, and test the site. Updating PHP libraries alone does not patch the interpreter. Do not disable TLS certificate or hostname validation. Until the runtime is patched, avoid automatic redirects in sensitive outbound stream requests.

Official advisory: https://github.com/php/php-src/security/advisories/GHSA-f6gg-rchx-xw8j
