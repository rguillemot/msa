#!/usr/bin/python

import sys

if len(sys.argv)>1:
	fichierIn = open(sys.argv[1],"r");
	for ligne in fichierIn:
		if "<!-- tags" in ligne or "<h2>" in ligne:
			sys.stdout.write(ligne);

