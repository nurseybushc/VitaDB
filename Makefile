start:
	$(info Make: Starting environment containers.)
	@docker-compose up -d
 
stop:
	$(info Make: Stopping environment containers.)
	@docker-compose rm -fsv
	@docker-compose down -v
	rm -rf db_data
 
restart:
	$(info Make: Restarting environment containers.)
	@make -s stop
	@make -s start