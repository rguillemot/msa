#!/usr/bin/python

import sys

if len(sys.argv)>1:
	fichierIn = open(sys.argv[1],"r");
	pos=0;
	for ligne in fichierIn:
		if "<p>" in ligne or "<h2>" in ligne or ("<li>" in ligne and "</li>" in ligne):
			pos=pos+1;
			sys.stdout.write("<!-- tags:"+str(pos)+"-->" + ligne);
		elif "href" in ligne:
			pos=pos+1;
			sys.stdout.write("<!-- tags:"+str(pos)+"-->" + ligne);
		elif "input" in ligne or "textarea" in ligne or "form" in ligne:
			pos=pos+1;
			sys.stdout.write("<!-- tags:"+str(pos)+"-->" + ligne);
		else:
			sys.stdout.write(ligne);

