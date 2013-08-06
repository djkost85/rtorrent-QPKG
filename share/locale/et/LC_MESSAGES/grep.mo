��    o      �  �         `	  �   a	  �   1
  0  �
  �  -     �  /    %  =  Q  c  g  �  k    G  �  %   �     �  0        <     Y  ,   u  ,   �  '   �  -   �      %  (   F  (   o     �     �     �     �     �     �  Q        Y  ?   s     �     �     �       $        @     R  <   m  <   �     �     �            5   -  1   c  :   �     �     �  #   �          4  3   K          �  &   �     �     �     �     �       (        B  �   W     5  ;   L  3   �  /   �  +   �  '     #   @     d     �     �     �  q   �     $  4   A     v  )   �  Z   �  F         a      }      �      �      �      �      �   $   !     5!     B!     Y!     j!  >   ~!     �!  M   �!  P   $"  ,   u"     �"     �"     �"     �"     �"     �"     #     &#     6#     B#  o  Q#  �   �$  �   �%  )  d&  �  �'     J)  "  g)    �*  `  �+  u  �,  t  s.  7  �/  +    1     L1  /   _1      �1     �1  "   �1  "   �1      2  #   02     T2  !   p2  !   �2     �2     �2     �2     �2     �2     �2  W   3     j3  A   �3     �3     �3     �3     
4     4     94     N4  =   e4  =   �4     �4     �4     �4     5  /   '5  ,   W5  2   �5     �5     �5     �5     �5     6  3   76     k6     r6  /   �6     �6     �6     �6     �6  	   �6  '   7     .7  �   E7     8  :   $8  2   _8  .   �8  +   �8  &   �8  "   9     79     V9     q9     �9  p   �9     �9  4   :     G:  $   c:  [   �:  <   �:  !   !;     C;     ];     {;  !   �;     �;     �;  "   �;     �;     	<     <     +<  @   C<      �<  H   �<  G   �<  "   6=     Y=     j=     {=     �=     �=     �=     �=     �=     �=     >     _   P   j   ;      C       .   Y   R   1       !       c   G           o   Z         L   =       V      
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
 ambiguous argument %s for %s character class syntax is [[:space:]], not [:space:] conflicting matchers specified in GREP_COLORS="%s", the "%s" capacity %s in GREP_COLORS="%s", the "%s" capacity is boolean and cannot take a value ("=%s"); skipped in GREP_COLORS="%s", the "%s" capacity needs a value ("=..."); skipped input is too large to count invalid %s%s argument `%s' invalid argument %s for %s invalid character class invalid context length argument invalid matcher %s invalid max count invalid suffix in %s%s argument `%s' lseek failed malformed repeat count memory exhausted no syntax specified others, see <http://git.sv.gnu.org/cgit/grep.git/tree/AUTHORS> recursive directory loop stopped processing of ill-formed GREP_COLORS="%s" at remaining substring "%s" support for the -P option is not compiled into this --disable-perl-regexp binary the -P option only supports a single pattern unbalanced ( unbalanced ) unbalanced [ unfinished \ escape unfinished repeat count unknown binary-files type unknown devices method warning: %s: %s write error writing output Project-Id-Version: grep 2.7
Report-Msgid-Bugs-To: bug-grep@gnu.org
POT-Creation-Date: 2011-06-21 20:06+0200
PO-Revision-Date: 2010-11-11 12:08+0200
Last-Translator: Toomas Soome <Toomas.Soome@microlink.ee>
Language-Team: Estonian <linux-ee@lists.eenet.ee>
Language: et
MIME-Version: 1.0
Content-Type: text/plain; charset=iso-8859-15
Content-Transfer-Encoding: 8-bit
 
Konteksti kontroll:
  -B, --before-context=NUM  v�ljasta NUM rida eelnevat konteksti
  -A, --after-context=NUM   v�ljasta NUM rida j�rgnevat konteksti
  -C, --context=NUM         v�ljasta NUM rida v�ljundi konteksti
 
Litsents GPLv3+: GNU GPL versioon 3 v�i uuem <http://gnu.org/licenses/gpl.html>
See on vaba tarkvara; teil on lubatud seda muuta ja levitada.
Garantii PUUDUB; vastavalt seadustega lubatud piiridele.
 
Muud:
  -s, --no-messages         blokeeri veateated
  -v, --invert-match        vali mitte-sobivad read
  -V, --version             esita versiooniinfo ja l�peta t��
      --help                esita see abiinfo ja l�peta t��
      --mmap                ignoreeritakse, tagasi�hilduvuse huvides
 
V�ljundi kontroll:
  -m, --max-count=NUM       peatu peale NUM leidu
  -b, --byte-offset         v�ljasta koos ridadega ka baidi indeks
  -n, --line-number         v�ljasta koos ridadega ka reanumber
      --line-buffered       t�hjenda v�ljund igal real
  -H, --with-filename       v�ljasta iga leiuga failinimi
  -h, --no-filename         blokeeri v�ljundis failinimi
      --label=M�RGEND       kasuta v�ljundis failinime asemel m�rgendit
 
Teatage palun vigadest: %s
       --include=FAILI_MUSTER  otsi alinult mustrile vastavaid faile
      --exclude=FAILI_MUSTER  v�lista mustrile vastavad failid ja kataloogid
      --exclude-from=FAIL    v�lista failid vastavalt failist loetud mustrile
      --exclude-dir=MUSTER   v�lista mustrile vastavad kataloogid.
   -E, --extended-regexp     MUSTER on laiendatud regulaaravaldis (ERE)
  -F, --fixed-strings       MUSTER on hulk reavahetustega eraldatud s�nesid
  -G, --basic-regexp        MUSTER on lihtne regulaaravaldis (BRE)
  -P, --perl-regexp         MUSTER on Perl regulaaravaldis
   -L, --files-without-match  v�ljasta ainult failide nimed, mis ei sobinud
  -l, --files-with-matches  v�ljasta ainult leitud failide nimed
  -c, --count               v�ljasta ainult leitud ridade arv faili kohta
  -T, --initial-tab         kasuta vajadusel ridade joondamisel tabulaatorit
  -Z, --null                v�ljasta faili nime j�rel bait 0
   -NUM                      sama, kui --context=NUM
      --color[=MILLAL],
      --colour[=MILLAL]     kasuta otsitava s�ne eristamiseks markereid
                            MILLAL v�ib olla `always', `never' v�i `auto'.
  -U, --binary              �ra eemalda rea l�pust CR s�mboleid (MSDOS)
  -u, --unix-byte-offsets   teata aadressid CR s�mboleid arvestamata (MSDOS)

   -e, --regexp=MUSTER       kasuta regulaaravaldisena
  -f, --file=FAIL           loe MUSTER failist FAIL
  -i, --ignore-case         ignoreeri suur- ja v�iket�htede erinevusi
  -w, --word-regexp         kasuta MUSTRIT s�nade leidmiseks
  -x, --line-regexp         kasuta MUSTRIT ridade leidmiseks
  -z, --null-data           andmerida l�ppeb baidil 0, mitte reavahetusel
   -o, --only-matching       n�ita ainult mustriga sobivat reaosa
  -q, --quiet, --silent     blokeeri kogu tavaline v�ljund
      --binary-files=T��P   eelda binaarfailide t��pi;
                            T��P on `binary', `text', v�i `without-match'
  -a, --text                sama, kui --binary-files=text
 %s saab kasutada ainult %s mustri s�ntaksit %s koduleht: <%s>
 %s koduleht: <http://www.gnu.org/software/%s/>
 %s%s argument `%s' on liiga suur %s: vigane v�ti -- '%c'
 %s: v�ti '%c%s' ei luba argumenti
 %s: v�ti '--%s' ei luba argumenti
 %s: v�ti '--%s' n�uab argumenti
 %s: v�ti '-W %s' ei luba argumenti
 %s: v�ti '-W %s' on segane
 %s: v�ti '-W %s' n�uab argumenti
 %s: v�ti n�uab argumenti -- '%c'
 %s: tundmatu v�ti '%c%s'
 %s: tundmatu v�ti '--%s'
 ' � (standardsisend) Kahendfail %s sobib
 N�iteks: %s -i 'tere k�ik' menu.h main.c

Regulaaravaldise valik ja interpreteerimine:
 GNU Grep koduleht: <%s>
 �ldine abiinfo GNU tarkvara kohta: <http://www.gnu.org/gethelp/>
 Vigane tagasi viide Vigane s�mbolklassi nimi Vigane sortimise s�mbol Vigane \{\} sisu Vigane eelnev regulaaravaldis Vigane vahemiku l�pp Vigane regulaaravaldis K�sk `egrep' kasutamine pole soovitatav; kasutage `grep -E'.
 K�sk `fgrep' kasutamine pole soovitatav; kasutage `grep -F'.
 M�lu on otsas Mike Haertel Vastet pole Eelnevat regulaaravaldist pole MUSTER on reavahetusega eraldatud s�nede hulk.
 MUSTER on laiendatud regulaaravaldis (ERE).
 MUSTER on vaikimisi lihtne regulaaravaldis (BRE).
 Pakendanud %s
 Pakendanud %s (%s)
 Ootamatu reagulaaravaldise l�pp Regulaaravaldis on liiga suur Teatage palun %s vigadest: %s
 Otsib MUSTRIT igast FAIList v�i standardsisendist.
 Edukas L�petav langkriips Lisainfo saamiseks proovige v�tit `%s --help'.
 Tundmatu s�steemi viga Puudub ( v�i \( Puudub ) v�i \) Puudub [ v�i [^ Puudub \{ Kasuta: %s [V�TI]... MUSTER [FAIL] ...
 Lubatud argumendid on: Kui faili ei antud, v�i anti -, loe standardsisendit. Kui anti v�hem kui kaks
faili, eelda -h. L�petamise kood on 0, kui rida leiti, muidu 1;
kui tekkis viga ja -q ei kasutatud, on l�petamise kood 2.
 Kirjutanud %s ja %s.
 Kirjutanud %s, %s, %s,
%s, %s, %s, %s,
%s, %s, ja teised.
 Kirjutanud %s, %s, %s,
%s, %s, %s, %s,
%s, ja %s.
 Kirjutanud %s, %s, %s,
%s, %s, %s, %s,
ja %s.
 Kirjuatanud %s, %s, %s,
%s, %s, %s, ja %s.
 Kirjutanud %s, %s, %s,
%s, %s, ja %s.
 Kirjutanud %s, %s, %s,
%s, ja %s.
 Kirjutanud %s, %s, %s,
ja %s.
 Kirjutanud %s, %s, ja %s.
 Kirjutanud %s.
 ` `egrep' t�hendab `grep -E'.  `fgrep' t�hendab `grep -F'.
Otsene `egrep' v�i `fgrep' kasutamine pole soovitatav.
 segane argument %s v�tmele %s s�mbolklassi s�ntaks on [[:space:]], mitte [:space:] m��rati konfliktsed otsijad GREP_COLORS="%s", on "%s" v��rtus %s GREP_COLORS="%s", on "%s" sisu t�ev��rtus ja ei saa kasutada v��rtust ("=%s"); j�tan vahele GREP_COLORS="%s", vajab "%s" v��rtust ("=..."); j�tan vahele sisend on loendamiseks liiga suur vigane %s%s argument `%s' vigane argument %s v�tmele %s vigane s�mboliklass vigane konteksti pikkuse argument vigane sobitaja %s vigane maksimum vigane sufiks %s%s argumendis `%s' lseek eba�nnestus vigane korduste arv m�lu on otsas s�ntaksit pole m��ratud teised, vaata <http://git.sv.gnu.org/cgit/grep.git/tree/AUTHORS> rekursiivne kataloogipuu ts�kkel Peatasin vigasele vormindatud GREP_COLORS="%s" t��tlemise alams�nel "%s" v�tme -P tuge ei ole kompileeritud sellesse --disable-perl-regexp koodi v�ti -P toetab ainult �hte mustrit balanseerimata ( balanseerimata ) balanseerimata [ l�petamata \ paojada l�petamata korduste arv tundmatu kahendfailide t��p tundmatu seadmete meetod hoiatus: %s: %s viga kirjutamisel kirjutan v�ljundit 