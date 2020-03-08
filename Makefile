start:
	$(info Make: Starting environment containers.)
	@docker-compose up -d
 
stop:
	$(info Make: Stopping environment containers.)
	@docker-compose down -v
 
restart:
	$(info Make: Restarting environment containers.)
	@make -s stop
	@make -s start