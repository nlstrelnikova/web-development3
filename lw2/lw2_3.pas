PROGRAM Name(INPUT, OUTPUT);
USES DOS;
VAR
  F: TEXT;
  S, S1: STRING;
  AmpPos, NamePos: INTEGER;
BEGIN
  ASSIGN(F, 't.tmp');
  REWRITE(F);
  WRITE(F, GetEnv('QUERY_STRING'));
  RESET(F);
  READ(F, S);
  NamePos := POS('name=', S);
  AmpPos := POS('&', s);
  WRITELN('HTTP/1.1 200 OK');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF NamePos <> 0
  THEN
    BEGIN
      IF AmpPos <> 0
      THEN
        S1 := COPY(S, NamePos + 5, AmpPos - NamePos - 5)
      ELSE
        S1 := COPY(S, NamePos + 5, length(s) - NamePos - 5);
      WRITELN('Hello dear, ', S1, '!')
    END
  ELSE
    WRITELN('Hello Anonymous!')
END.
