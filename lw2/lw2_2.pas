{$IFDEF NORMAL}
  {$H-,I+,OBJECTCHECKS-,Q-,R-,S-}
{$ENDIF NORMAL}
{$IFDEF DEBUG}
  {$H-,I+,OBJECTCHECKS-,Q+,R+,S-}
{$ENDIF DEBUG}
{$IFDEF RELEASE}
  {$H-,I-,OBJECTCHECKS-,Q-,R-,S-}
{$ENDIF RELEASE}
PROGRAM PaulRevere(INPUT, OUTPUT);
USES DOS;
VAR
  Lanterns, W1, W2, W3, W4, W5, W6, W7, W8, W9, W10: CHAR;
  F: TEXT;
BEGIN {PaulRevere}
  {Read Lanterns}
  ASSIGN(F, 't.tmp');
  REWRITE(F);
  WRITE(F, GetEnv('QUERY_STRING'));
  RESET(F);
  Lanterns := 'Y';
  WHILE (NOT EOLN(F)) AND (Lanterns = 'Y')
  DO
    BEGIN
      IF (W1 = 'L') AND (W2 = 'a') AND (W3 = 'n') AND (W4 = 't') AND (W5 = 'e') AND (W6 = 'r') AND (W7 = 'n') AND (W8 = 's') AND (W9 = '=') AND (W10 = '1')
      THEN
        Lanterns := '1';
      IF (W1 = 'L') AND (W2 = 'a') AND (W3 = 'n') AND (W4 = 't') AND (W5 = 'e') AND (W6 = 'r') AND (W7 = 'n') AND (W8 = 's') AND (W9 = '=') AND (W10 = '2')
      THEN
        Lanterns := '2';
      W1 := W2;
      W2 := W3;
      W3 := W4;
      W4 := W5;
      W5 := W6;
      W6 := W7;
      W7 := W8;
      W8 := W9;
      W9 := W10;
      READ(F, W10);
    END;
  WRITELN('HTTP/1.1 200 OK');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  {Issue Paul Revere's message}
  IF Lanterns = '1'
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF Lanterns = '2'
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('The North Church shows only.')
END. {PaulRevere}

