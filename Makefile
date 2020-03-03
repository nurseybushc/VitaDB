start:
	@docker-compose up -d
 
stop:
	$(info Make: Stopping "$(ENV)" environment containers.)
	@docker-compose stop
 
restart:
	$(info Make: Restarting "$(ENV)" environment containers.)
	@make -s stop
	@make -s start