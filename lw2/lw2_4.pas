PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES DOS;

FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  Fststring, Substring, Parameter: STRING;
  AmpPos, EqPos: INTEGER;
  Flag: CHAR;
BEGIN
  Fststring := GetEnv('QUERY_STRING');
  AmpPos := POS('&', Fststring);
  Flag := '0';
  WHILE (AmpPos <> 0) AND (Flag = '0')
  DO
    BEGIN
      EqPos := POS('=', Fststring);
      Substring := COPY(Fststring, 1, EqPos - 1);
      IF Substring = Key
      THEN
        BEGIN
          Flag := '1';
          parameter := COPY(Fststring, EqPos + 1, AmpPos - EqPos - 1)
        END;
      Fststring := COPY(Fststring, AmpPos + 1, length(Fststring)-AmpPos);
      AmpPos := POS('&', Fststring)
    END;
  IF (AmpPos = 0) AND (Flag = '0')
  THEN
    BEGIN
      EqPos := POS('=', Fststring);
      IF EqPos <> 0
      THEN
        BEGIN
          Substring := COPY(Fststring, 1, EqPos - 1);
          IF Substring = Key
          THEN
            BEGIN
              Flag := '1';
              Parameter := COPY(Fststring, EqPos + 1, length(Fststring))
            END
        END
    END;
  IF Flag = '0'
  THEN
    Parameter := 'The key not found';
  GetQueryStringParameter := Parameter
END;

BEGIN {WorkWithQueryString}
  WRITELN;
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}
