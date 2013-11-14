#!/usr/bin/python

import sys
import re

if len(sys.argv)>2:
	fichierIn = open(sys.argv[1],"r");
	fichierTags = open(sys.argv[2],"r");

	dico = {};

	for ligne in fichierTags:
		tags = re.search(r'<!--(.*)--\>',ligne);
		if tags:
			dico[tags.group()]=ligne;

	for ligne in fichierIn:
		tags = re.search(r'<!--(.*)--\>',ligne);
		if tags:
			if tags.group() in dico:
				sys.stdout.write(dico[tags.group()]);
			else:
				sys.stdout.write(ligne);

		else:
			sys.stdout.write(ligne);

