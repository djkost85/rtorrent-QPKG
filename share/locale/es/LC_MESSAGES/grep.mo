��    o      �  �         `	  �   a	  �   1
  0  �
  �  -     �  /    %  =  Q  c  g  �  k    G  �  %   �     �  0        <     Y  ,   u  ,   �  '   �  -   �      %  (   F  (   o     �     �     �     �     �     �  Q        Y  ?   s     �     �     �       $        @     R  <   m  <   �     �     �            5   -  1   c  :   �     �     �  #   �          4  3   K          �  &   �     �     �     �     �       (        B  �   W     5  ;   L  3   �  /   �  +   �  '     #   @     d     �     �     �  q   �     $  4   A     v  )   �  Z   �  F         a      }      �      �      �      �      �   $   !     5!     B!     Y!     j!  >   ~!     �!  M   �!  P   $"  ,   u"     �"     �"     �"     �"     �"     �"     #     &#     6#     B#  \  Q#  �   �$  �   �%  G  g&  �  �'  (   �*  [  �*  c  ,  �  ~-  �  V/  6  >1  �  u3  1   �4     )5  9   F5  $   �5     �5  2   �5  2   �5  ,   *6  3   W6  "   �6  -   �6  -   �6  !   
7  !   ,7     N7     P7     T7  &   h7  T   �7  "   �7  M   8  !   U8  '   w8     �8     �8  -   �8     9      9  K   =9  K   �9     �9     �9     �9  *   :  C   9:  3   }:  @   �:     �:     ;  (   ;  )   H;  !   r;  9   �;     �;     �;  +   �;     <     8<     M<     b<     w<  5   �<     �<    �<     �=  9    >  2   :>  .   m>  *   �>  &   �>  "   �>     ?     0?     K?     \?  y   ^?     �?  B   �?  ,   8@  *   e@  ^   �@  K   �@  *   ;A     fA     �A     �A     �A     �A     �A  *   B  %   9B      _B     �B  &   �B  @   �B     �B  H   C  Y   _C  )   �C     �C     �C     D  "   D  $   6D     [D  #   yD     �D     �D     �D     _   P   j   ;      C       .   Y   R   1       !       c   G           o   Z         L   =       V      
            `   n   7   O      i   [          -          @      4   ?          #           3   &           J   <       h   N           E   ]   /   g           >          (   a       8      S   2             K   0       %   9   ^   M   D       \      f      B       F       d   "   X       ,          *      6   b   $   )      e   :       W   5      T                 U   l       A       H      +               k       I                 '   Q   	   m           
Context control:
  -B, --before-context=NUM  print NUM lines of leading context
  -A, --after-context=NUM   print NUM lines of trailing context
  -C, --context=NUM         print NUM lines of output context
 
License GPLv3+: GNU GPL version 3 or later <http://gnu.org/licenses/gpl.html>.
This is free software: you are free to change and redistribute it.
There is NO WARRANTY, to the extent permitted by law.

 
Miscellaneous:
  -s, --no-messages         suppress error messages
  -v, --invert-match        select non-matching lines
  -V, --version             print version information and exit
      --help                display this help and exit
      --mmap                ignored for backwards compatibility
 
Output control:
  -m, --max-count=NUM       stop after NUM matches
  -b, --byte-offset         print the byte offset with output lines
  -n, --line-number         print line number with output lines
      --line-buffered       flush output on every line
  -H, --with-filename       print the filename for each match
  -h, --no-filename         suppress the prefixing filename on output
      --label=LABEL         print LABEL as filename for standard input
 
Report bugs to: %s
       --include=FILE_PATTERN  search only files that match FILE_PATTERN
      --exclude=FILE_PATTERN  skip files and directories matching FILE_PATTERN
      --exclude-from=FILE   skip files matching any file pattern from FILE
      --exclude-dir=PATTERN  directories that match PATTERN will be skipped.
   -E, --extended-regexp     PATTERN is an extended regular expression (ERE)
  -F, --fixed-strings       PATTERN is a set of newline-separated fixed strings
  -G, --basic-regexp        PATTERN is a basic regular expression (BRE)
  -P, --perl-regexp         PATTERN is a Perl regular expression
   -L, --files-without-match  print only names of FILEs containing no match
  -l, --files-with-matches  print only names of FILEs containing matches
  -c, --count               print only a count of matching lines per FILE
  -T, --initial-tab         make tabs line up (if needed)
  -Z, --null                print 0 byte after FILE name
   -NUM                      same as --context=NUM
      --color[=WHEN],
      --colour[=WHEN]       use markers to highlight the matching strings;
                            WHEN is `always', `never', or `auto'
  -U, --binary              do not strip CR characters at EOL (MSDOS)
  -u, --unix-byte-offsets   report offsets as if CRs were not there (MSDOS)

   -e, --regexp=PATTERN      use PATTERN for matching
  -f, --file=FILE           obtain PATTERN from FILE
  -i, --ignore-case         ignore case distinctions
  -w, --word-regexp         force PATTERN to match only whole words
  -x, --line-regexp         force PATTERN to match only whole lines
  -z, --null-data           a data line ends in 0 byte, not newline
   -o, --only-matching       show only the part of a line matching PATTERN
  -q, --quiet, --silent     suppress all normal output
      --binary-files=TYPE   assume that binary files are TYPE;
                            TYPE is `binary', `text', or `without-match'
  -a, --text                equivalent to --binary-files=text
 %s can only use the %s pattern syntax %s home page: <%s>
 %s home page: <http://www.gnu.org/software/%s/>
 %s%s argument `%s' too large %s: invalid option -- '%c'
 %s: option '%c%s' doesn't allow an argument
 %s: option '--%s' doesn't allow an argument
 %s: option '--%s' requires an argument
 %s: option '-W %s' doesn't allow an argument
 %s: option '-W %s' is ambiguous
 %s: option '-W %s' requires an argument
 %s: option requires an argument -- '%c'
 %s: unrecognized option '%c%s'
 %s: unrecognized option '--%s'
 ' (C) (standard input) Binary file %s matches
 Example: %s -i 'hello world' menu.h main.c

Regexp selection and interpretation:
 GNU Grep home page: <%s>
 General help using GNU software: <http://www.gnu.org/gethelp/>
 Invalid back reference Invalid character class name Invalid collation character Invalid content of \{\} Invalid preceding regular expression Invalid range end Invalid regular expression Invocation as `egrep' is deprecated; use `grep -E' instead.
 Invocation as `fgrep' is deprecated; use `grep -F' instead.
 Memory exhausted Mike Haertel No match No previous regular expression PATTERN is a set of newline-separated fixed strings.
 PATTERN is an extended regular expression (ERE).
 PATTERN is, by default, a basic regular expression (BRE).
 Packaged by %s
 Packaged by %s (%s)
 Premature end of regular expression Regular expression too big Report %s bugs to: %s
 Search for PATTERN in each FILE or standard input.
 Success Trailing backslash Try `%s --help' for more information.
 Unknown system error Unmatched ( or \( Unmatched ) or \) Unmatched [ or [^ Unmatched \{ Usage: %s [OPTION]... PATTERN [FILE]...
 Valid arguments are: With no FILE, or when FILE is -, read standard input.  If less than two FILEs
are given, assume -h.  Exit status is 0 if any line was selected, 1 otherwise;
if any error occurs and -q was not given, the exit status is 2.
 Written by %s and %s.
 Written by %s, %s, %s,
%s, %s, %s, %s,
%s, %s, and others.
 Written by %s, %s, %s,
%s, %s, %s, %s,
%s, and %s.
 Written by %s, %s, %s,
%s, %s, %s, %s,
and %s.
 Written by %s, %s, %s,
%s, %s, %s, and %s.
 Written by %s, %s, %s,
%s, %s, and %s.
 Written by %s, %s, %s,
%s, and %s.
 Written by %s, %s, %s,
and %s.
 Written by %s, %s, and %s.
 Written by %s.
 ` `egrep' means `grep -E'.  `fgrep' means `grep -F'.
Direct invocation as either `egrep' or `fgrep' is deprecated.
 ambiguous argument %s for %s character class syntax is [[:space:]], not [:space:] conflicting matchers specified in GREP_COLORS="%s", the "%s" capacity %s in GREP_COLORS="%s", the "%s" capacity is boolean and cannot take a value ("=%s"); skipped in GREP_COLORS="%s", the "%s" capacity needs a value ("=..."); skipped input is too large to count invalid %s%s argument `%s' invalid argument %s for %s invalid character class invalid context length argument invalid matcher %s invalid max count invalid suffix in %s%s argument `%s' lseek failed malformed repeat count memory exhausted no syntax specified others, see <http://git.sv.gnu.org/cgit/grep.git/tree/AUTHORS> recursive directory loop stopped processing of ill-formed GREP_COLORS="%s" at remaining substring "%s" support for the -P option is not compiled into this --disable-perl-regexp binary the -P option only supports a single pattern unbalanced ( unbalanced ) unbalanced [ unfinished \ escape unfinished repeat count unknown binary-files type unknown devices method warning: %s: %s write error writing output Project-Id-Version: GNU grep 2.7
Report-Msgid-Bugs-To: bug-grep@gnu.org
POT-Creation-Date: 2011-06-21 20:06+0200
PO-Revision-Date: 2010-11-01 18:38+0100
Last-Translator: Santiago Vila Doncel <sanvila@unex.es>
Language-Team: Spanish <es@li.org>
Language: es
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8-bit
 
Control del contexto:
  -B, --before-context=NÚM  muestra NÚM líneas de contexto anterior
  -A, --after-context=NÚM   muestra NÚM líneas de contexto posterior
  -C, --context=NÚM         muestra NÚM líneas de contexto
 
Licencia GPLv3+: GPL de GNU versión 3 o posterior
<http://gnu.org/licenses/gpl.html>
Esto es software libre: usted es libre de cambiarlo y redistribuirlo.
No hay NINGUNA GARANTÍA, hasta donde permite la ley.
 
Variadas:
  -s, --no-messages         suprime los mensajes de error
  -v, --invert-match        selecciona las líneas que no coinciden
  -V, --version             muestra la versión y finaliza
      --help                muestra esta ayuda y finaliza
      --mmap                se descarta para compatibilidad hacia atrás
 
Control del resultado:
  -m, --max-count=NÚM       se detiene después de NÚM coincidencias
  -b, --byte-offset         muestra el desplazamiento en bytes junto
                            con las líneas de salida
  -n, --line-number         muestra el número de línea junto con
                            las líneas de salida
      --line-buffered       descarga el resultado para cada línea
  -H, --with-filename       muestra el nombre del fichero para cada
                            coincidencia
  -h, --no-filename         suprime los nombres de los ficheros en
                            el resultado
      --label=ETIQUETA      muestra ETIQUETA como nombre de fichero para la
                            entrada estándar
 
Comunicar errores en el programa a: %s
       --include=PATRÓN      examina los ficheros que encajan con PATRÓN
      --exclude=PATRÓN      se salta los ficheros que encajan con PATRÓN
      --exclude-from=FICHERO se salta los ficheros que encajan con los patrones
                             de FICHERO
      --exclude-dir=PATRÓN  se salta los directorios que encajan con PATRÓN
   -E, --extended-regexp     PATRÓN es una expresión regular extendida (ERE)
  -F, --fixed-strings       PATRÓN es un conjunto de cadenas separadas por
                            caracteres de nueva línea
  -G, --basic-regexp        PATRÓN es una expresión regular básica (BRE)
  -P, --perl-regexp         PATRÓN es una expresión regular en Perl
   -L, --files-without-match muestra solamente los nombres de FICHEROs
                            que no contienen ninguna coincidencia
  -l, --files-with-matches  muestra solamente los nombres de FICHEROs
                            que contienen alguna coincidencia
  -c, --count               muestra solamente el total de líneas que coinciden
                            por cada FICHERO
  -Z, --null                imprime un byte 0 después del nombre del FICHERO
   -NÚM                      lo mismo que --context=NÚM
      --color[=CUÁNDO],
      --colour[=CUÁNDO]     distingue con marcadores la cadena que encaja
                            CUÁNDO puede ser `always', `never' o `auto'.
  -U, --binary              no elimina los caracteres de retorno de carro
                            finales de línea (MSDOS)
  -u, --unix-byte-offsets   cuenta los desplazamientos como si no hubiera
                            retornos de carro (MSDOS)
   -e, --regexp=PATRÓN       utiliza PATRÓN como expresión regular
  -f, --file=FICHERO        obtiene PATRÓN de FICHERO
  -i, --ignore-case         considera iguales mayúsculas y minúsculas
  -w, --word-regexp         obliga a que PATRÓN coincida solamente
                            con palabras completas
  -x, --line-regexp         obliga a que PATRÓN coincida solamente
                            con líneas completas
  -z, --null-data           una línea de datos termina en un byte 0, no
                            en un carácter de nueva línea
   -o, --only-matching       muestra solamente la parte de una línea que
                            encaja con PATRÓN
  -q, --quiet, --silent     suprime todo el resultado normal
      --binary-files=TIPO   supone que los ficheros binarios son TIPO
                            TIPO es `binary', `text', o `without-match'
  -a, --text                equivalente a --binary-files=text
 %s solamente puede usar la sintaxis de patrón %s Página inicial de %s: <%s>
 página inicial de %s: <http://www.gnu.org/software/%s/>
 %s%s argumento `%s' demasiado grande %s: opción inválida -- '%c'
 %s: la opción '%c%s' no admite ningún argumento
 %s: la opción '--%s' no admite ningún argumento
 %s: la opción '--%s' requiere un argumento
 %s: la opción '-W %s' no admite ningún argumento
 %s: la opción '-W %s' es ambigua
 %s: la opción '-W %s' requiere un argumento
 %s: la opción requiere un argumento -- '%c'
 %s: opción no reconocida '%c%s'
 %s: opción no reconocida '--%s'
 ' (C) (entrada estándar) Coincidencia en el fichero binario %s
 Ejemplo: %s -i 'hello world' menu.h main.c

Selección e interpretación de Expreg:
 Página inicial de GNU grep: <%s>
 Ayuda general sobre el uso de software de GNU: <http://www.gnu.org/gethelp/>
 Referencia hacia atrás inválida Nombre de clase de caracteres inválido Carácter de unión inválido Contenido inválido de \{\} La expresión regular precedente es inválida Final de rango inválido Expresión regular inválida La invocación como `egrep' está obsoleta; utilice `grep -E' en su lugar.
 La invocación como `fgrep' está obsoleta; utilice `grep -F' en su lugar.
 Memoria agotada Mike Haertel No hay ninguna coincidencia No hay ninguna expresión regular anterior PATRÓN es un conjunto de cadenas fijas separadas por nueva línea
 PATRÓN es una expresión regular extendida (ERE).
 PATRÓN es, por omisión, una expresión regular básica (BRE).
 Empaquetado por %s
 Empaquetado por %s (%s)
 Final prematuro de la expresión regular La expresión regular es demasiado grande Comunicar errores sobre %s a: %s
 Busca PATRÓN en cada FICHERO o en la entrada estándar.
 Éxito Barra invertida al final Pruebe `%s --help' para más información.
 Error del sistema desconocido ( o \( desemparejado ) o \) desemparejado [ o [^ desemparejado \{ desemparejado Modo de empleo: %s [OPCIÓN]... PATRÓN [FICHERO]...
 Los argumentos válidos son: Si no se especifica ningún FICHERO, o cuando FICHERO es -, lee la entrada
estándar. Si se dan menos de dos FICHEROs, se supone -h. El estado de salida
es 0 si hay coincidencias, 1 si no las hay; si ocurre algún error y no se
especificó -q, el estado de salida es 2.
 Escrito por %s y %s.
 Escrito por %s, %s, %s,
%s, %s, %s, %s,
%s, %s, y otros.
 Escrito por %s, %s, %s,
%s, %s, %s, %s,
%s, y %s.
 Escrito por %s, %s, %s,
%s, %s, %s, %s,
y %s.
 Escrito por %s, %s, %s,
%s, %s, %s, y %s.
 Escrito por %s, %s, %s,
%s, %s, y %s.
 Escrito por %s, %s, %s,
%s, y %s.
 Escrito por %s, %s, %s,
y %s.
 Escrito por %s, %s, y %s.
 Escrito por %s.
 ` `egrep' significa `grep -E'.  `fgrep' significa `grep -F'.
La invocación directa como `egrep' o `fgrep' está obsoleta.
 argumento %s ambiguo para %s la sintaxis de la clase de caracteres es [[:space:]], no [:space:] se han especificado expresiones conflictivas en GREP_COLORS="%s", la capacidad "%s" %s. en GREP_COLORS="%s", la capacidad "%s" es booleana y no puede tener un valor ("=%s"); saltado. en GREP_COLORS="%s", la capacidad "%s" necesita un valor ("=..."); saltado. la entrada es demasiado grande para contar argumento %s%s inválido `%s' argumento %s inválido %s clase de caracteres inválida longitud de contexto inválida expresión inválida %s contador máximo inválido sufijo inválido en el argumento %s%s `%s' falló la llamada al sistema `lskeek' contador de repetición erróneo memoria agotada no se ha especificado ninguna sintaxis otros, véase <http://git.sv.gnu.org/cgit/grep.git/tree/AUTHORS> bucle de directorio recursivo el proceso del erróneo GREP_COLORS="%s" se detuvo en la subcadena "%s". el soporte para la opción -P no está compilado en este ejecutable --disable-perl-regexp la opción -P solamente admite un patrón ( desemparejado ) desemparejado [ desemparejado secuencia de escape \ sin terminar contador de repetición sin terminar tipo binary-files desconocido método de dispositivos desconocido atención: %s: %s error de escritura escribiendo el resultado 