while true
do
    if read line <$pipe; then
        if [[ "$line" == 'quit' ]]; then
            break
        fi
        echo $line
	
	runuser -l miner -c "screen -S Mine -p 0 -X eval 'stuff \"whitelist add $line\"\\015'"


	#echo $line >> /home/miner/server2/white-list.txt
	#su miner /home/miner/server/loadplayer.sh
	# su miner screen -S Mine -p 0 -X eval 'stuff "whitelist add '$line'"\015'

	
       # a="'"
       # b="stuff "
       # c="\""
       # d="say whitelist add "
       # e="\""
       # f="\015"
       # g="'"
#       sudo -u miner screen -S Mine -p 0 -X eval 'stuff "say whitelist add $line"\015'
       # echo $a$b$c$d$line$e$f$g
	# sudo -u miner script /dev/null
	 #sudo -u miner screen -S Mine -p -X eval $a$b$c$d$line$e$f$g
	#sudo -u miner exit

#	sudo -u miner screen -S Mine -p 0 -X eval 'stuff "say whitelist add $line"\015'
#	echo "test"
#	echo $a$b$line$c
#	echo "test"
#	sudo -u miner screen -S Mine -p 0 -X eval $a$b$line$c
	fi
done

