#!/usr/bin/python

import sys
import re
if len(sys.argv)>1:
	fichierIn = open(sys.argv[1],"r");
	pos = 0;
	for ligne in fichierIn:
		tags = re.search(r'<!--(.*)-->',ligne);
		if tags:
			pos = pos+1
			sys.stdout.write("<!-- tags:" + str(pos) + "-->" + ligne[len(tags.group(0)):]);		

